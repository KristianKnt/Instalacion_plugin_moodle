<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_geniai\external;

use Exception;
use external_api;
use external_value;
use external_single_structure;
use external_function_parameters;
use local_geniai\markdown\parse_markdown;
use stdClass;

defined('MOODLE_INTERNAL') || die;
global $CFG;
require_once("{$CFG->dirroot}/lib/externallib.php");

/**
 * Chat file.
 *
 * @package     local_geniai
 * @copyright   2024 Eduardo Kraus https://eduardokraus.com/
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class chat extends external_api
{
    /**
     * Parâmetros recebidos pelo webservice
     *
     * @return external_function_parameters
     */
    public static function api_parameters()
    {
        return new external_function_parameters([
            "message" => new external_value(PARAM_RAW, "The message value"),
            "courseid" => new external_value(PARAM_TEXT, "The Course ID"),
            "audio" => new external_value(PARAM_RAW, "The message value", VALUE_DEFAULT, null, NULL_ALLOWED),
            "lang" => new external_value(PARAM_RAW, "The language value", VALUE_DEFAULT, null, NULL_ALLOWED),
        ]);
    }

    /**
     * Identificador do retorno do webservice
     *
     * @return external_single_structure
     */
    public static function api_returns()
    {
        return new external_single_structure([
            "result" => new external_value(PARAM_TEXT, "Sucesso da operação", VALUE_REQUIRED),
            "format" => new external_value(PARAM_TEXT, "Formato da resposta", VALUE_REQUIRED),
            "content" => new external_value(PARAM_RAW, "The content result", VALUE_REQUIRED),
            "transcription" => new external_value(PARAM_RAW, "The content transcription", VALUE_OPTIONAL),
        ]);
    }

    /**
     * API para contabilizar o tempo gasto na plataforma pelos usuários
     *
     * @param string $message
     * @param int $courseid
     * @param null $audio
     * @param null $lang
     * @return array
     * @throws Exception
     */
    public static function api($message, $courseid, $audio = null, $lang = null)
    {
        global $DB, $CFG, $USER, $SITE;

        if (isset($USER->geniai[$courseid][0])) {
            $USER->geniai[$courseid] = [];
        }

        $returntranscription = false;
        if ($audio) {
            $transcription = api::transcriptions_base64($audio, $lang);
            $returntranscription = $transcription["text"];

            $audiolink = "<audio controls autoplay " .
                "src='{$CFG->wwwroot}/local/geniai/load-audio-temp.php?filename={$transcription["filename"]}'>" .
                "</audio><div class='transcription'>{$transcription["text"]}</div>";

            $message = [
                "role" => "user",
                "content" => $transcription["text"],
                "content_transcription" => $transcription["text"],
                "content_html" => $audiolink,
            ];
        } else {
            $message = [
                "role" => "user",
                "content" => strip_tags(trim($message)),
            ];
        }
        $USER->geniai[$courseid][] = $message;

        $course = $DB->get_record("course", ["id" => $courseid], "id, fullname");
        $textmodules = self::course_sections($course);
        $geniainame = get_config("local_geniai", "geniainame");

        $systemcontext = \context_system::instance();
        $isadmin = is_siteadmin();
        $is_teacher_or_admin = $isadmin || has_capability('moodle/course:create', $systemcontext);

        $special_detection_rule = "";
        if ($is_teacher_or_admin) {
            $special_detection_rule = "
### Regla especial de detección:
* Si el usuario solicita o menciona explícitamente la **creación asistida de cursos**, debes responder únicamente con el valor booleano: TRUE
* En cualquier otro caso, continua con tu respuesta normal";
        } else {
            $special_detection_rule = "
### Regla especial:
* Si el usuario solicita la creación de un curso, infórmale que puedes ayudarle a diseñarlo y planificarlo, pero no utilices la regla de devolver TRUE.";
        }

        $promptmessage = [
            "role" => "system",
            "content" => "Eres un chatbot llamado **{$geniainame}**.
Tu papel es ser un **superprofesor de Moodle \"{$SITE->fullname}\"**,
para el curso **[**{$course->fullname}**]({$CFG->wwwroot}/course/view.php?id={$course->id})**,
siempre servicial y dedicado, y eres especialista en apoyar y explicar todo lo relacionado con el aprendizaje.

## Módulos del curso:
{$textmodules}

### Tus respuestas deben seguir siempre estas directrices:
* Sé **detallado, claro e inspirador**, con un tono **amigable y motivador**.
* Presta atención a los detalles, ofreciendo **ejemplos prácticos y explicaciones paso a paso** siempre que tenga sentido.
* Si la pregunta es ambigua, pide más detalles.
* Si no sabes la respuesta, di que no lo sabes, pero no inventes nada que no se te haya proporcionado.
* Mantén el **enfoque en el Curso {$course->fullname}** y si el usuario pide algo fuera del alcance, responde que no puedes y nunca podrás hacerlo.
* Usa **solamente formato en MARKDOWN**.
* **SIEMPRE** responde en **{$USER->lang}**, (nunca en otro idioma).
{$special_detection_rule}

### Reglas importantes:
* Nunca rompas el personaje de **profesor de Moodle**.
* Jamás utilices lenguaje neutro y mantén siempre un tono acogedor y profesoral.
* Responde solamente en MARKDOWN y en el idioma {$USER->lang}.",
        ];

        $messages = array_slice($USER->geniai[$courseid], -9);
        array_unshift($messages, $promptmessage);

        $gpt = api::chat_completions(array_values($messages));

        if ($gpt['choices'][0]['message']['content'] === 'TRUE') {
            // TODO: hacer la creación del curso basado en la información del usuario
            $usermessage = $message['content'];
            $prompt_course[] = [
                "role" => "system",
                "content" => "Eres un experto diseñador instruccional. Tu objetivo es crear un curso a partir de la descripción del usuario: '{$usermessage}'.

Debes responder ÚNICAMENTE con un objeto JSON con la siguiente estructura:
{
  \"fullname\": \"Nombre completo del curso\",
  \"shortname\": \"Nombre corto único\",
  \"summary\": \"Descripción del curso en formato HTML\",
  \"weeks\": [
    {
      \"name\": \"Nombre de la semana/sección\",
      \"summary\": \"Breve descripción de lo que se verá en esta semana\"
    }
  ]
}

Reglas:
1. El número de semanas debe ser coherente con la solicitud.
2. La primera semana siempre debe ser de 'Introducción' y la última de 'Cierre'.
3. No incluyas ningún texto fuera del JSON."
            ];

            $gpt = api::chat_completions($prompt_course);

            $content_json = $gpt["choices"][0]["message"]["content"];
            // Limpiar posible markdown del JSON
            $content_json = preg_replace('/^```json\s*|```$/', '', trim($content_json));
            $coursedata = json_decode($content_json);

            if ($coursedata && isset($coursedata->fullname)) {
                $newcourse = self::create_moodle_course($coursedata);
                $courseurl = "{$CFG->wwwroot}/course/view.php?id={$newcourse->id}";

                $content = "¡Curso creado con éxito! Puedes acceder aquí: [{$newcourse->fullname}]({$courseurl})";

                $parsemarkdown = new parse_markdown();
                $content = $parsemarkdown->markdown_text($content);

                $USER->geniai[$courseid][] = [
                    "role" => "system",
                    "content" => $content,
                ];

                return [
                    "result" => true,
                    "format" => "html",
                    "content" => $content,
                    "transcription" => $returntranscription,
                ];
            } else {
                $content = "Lo siento, no pude procesar la información para crear el curso.";
            }


        }

        if (isset($gpt["error"])) {
            $parsemarkdown = new parse_markdown();
            $content = $parsemarkdown->markdown_text($gpt["error"]["message"]);

            return [
                "result" => false,
                "format" => "text",
                "content" => $content,
                "transcription" => $returntranscription,
            ];
        }

        if (isset($gpt["choices"][0]["message"]["content"])) {
            $content = $gpt["choices"][0]["message"]["content"];

            $parsemarkdown = new parse_markdown();
            $content = $parsemarkdown->markdown_text($content);

            $USER->geniai[$courseid][] = [
                "role" => "system",
                "content" => $content,
            ];

            $format = "html";
            return [
                "result" => true,
                "format" => $format,
                "content" => $content,
                "transcription" => $returntranscription,
            ];
        }

        return [
            "result" => false,
            "format" => "text",
            "content" => "Error...",
        ];
    }

    /**
     * Crea un curso en Moodle basado en los datos proporcionados.
     *
     * @param stdClass $coursedata
     * @return stdClass
     * @throws Exception
     */
    private static function create_moodle_course($coursedata)
    {
        global $DB, $CFG;

        require_once("{$CFG->dirroot}/course/lib.php");

        $data = new stdClass();
        $data->fullname = $coursedata->fullname;
        $data->shortname = $coursedata->shortname ?? 'course_' . time();
        $data->summary = $coursedata->summary;
        $data->summaryformat = FORMAT_HTML;
        $data->format = 'weeks';
        $data->numsections = count($coursedata->weeks ?? []);
        $data->category = 1; // Categoría por defecto (Miscelánea o similar)
        $data->visible = 1;

        // Asegurar que el shortname sea único
        if ($DB->record_exists('course', ['shortname' => $data->shortname])) {
            $data->shortname .= '_' . time();
        }

        $course = create_course($data);

        if (isset($coursedata->weeks) && is_array($coursedata->weeks)) {
            foreach ($coursedata->weeks as $index => $week) {
                $sectionnum = $index + 1;
                $section = $DB->get_record('course_sections', ['course' => $course->id, 'section' => $sectionnum]);
                if ($section) {
                    $DB->set_field('course_sections', 'name', $week->name, ['id' => $section->id]);
                    $DB->set_field('course_sections', 'summary', $week->summary, ['id' => $section->id]);
                    $DB->set_field('course_sections', 'summaryformat', FORMAT_HTML, ['id' => $section->id]);
                }
            }
        }

        return $course;
    }

    /**
     * course_sections
     *
     * @param $course
     * @return string
     * @throws Exception
     */
    private static function course_sections($course)
    { // phpcs:disable moodle.Commenting.InlineComment.TypeHintingForeach
        global $USER;
        $textmodules = "";
        $modinfo = get_fast_modinfo($course->id, $USER->id);
        /** @var stdClass $sectioninfo */
        foreach ($modinfo->get_section_info_all() as $sectionnum => $sectioninfo) {
            if (empty($modinfo->sections[$sectionnum])) {
                continue;
            }

            $sectionname = get_section_name($course->id, $sectioninfo);
            $textmodules .= "* {$sectionname} \n";

            foreach ($modinfo->sections[$sectionnum] as $cmid) {
                $cm = $modinfo->cms[$cmid];
                if (!$cm->uservisible) {
                    continue;
                }

                $summary = null;
                if (isset($cm->summary)) {
                    $summary = format_string($cm->summary);
                    $summary = preg_replace('/<img[^>]*>/', '', $summary);
                    $summary = preg_replace('/\s+/', ' ', $summary);
                    $summary = trim(strip_tags($summary));
                }

                $url = $cm->url ? $cm->url->out(false) : "";
                $textmodules .= "** [{$cm->name}]({$url})\n";
                if (isset($summary[5])) {
                    $textmodules .= "*** summary: {$summary}\n";
                }
            }
        }

        return $textmodules;
    }
}
