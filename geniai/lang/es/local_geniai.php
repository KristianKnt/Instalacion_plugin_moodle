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

/**
 * lang es file.
 *
 * @package   local_geniai
 * @copyright 2024 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['agentphoto'] = 'Foto del agente de IA';
$string['agentphoto_desc'] = 'Imagen mostrada como el avatar del agente de IA durante las conversaciones del chat.';
$string['apikey'] = 'Clave API de OpenAI';
$string['apikey_desc'] = 'La clave API de su cuenta de OpenAI';
$string['case'] = 'Casos de uso';
$string['caseuse_balanced'] = 'Respuestas equilibradas => Temperatura 0.5 - 0.7, Top_p 0.7';
$string['caseuse_chatbot'] = 'Chatbot => Temperatura 0.2 - 0.6, Top_p 0.8';
$string['caseuse_creative'] = 'Generación creativa => Temperatura 0.7 - 1.0, Top_p 0.8';
$string['caseuse_exploration'] = 'Exploración de opciones => Temperatura 0.8 - 1.0, Top_p 0.9';
$string['caseuse_formal'] = 'Tono formal => Temperatura 0.3 - 0.5, Top_p 0.6';
$string['caseuse_informal'] = 'Tono informal => Temperatura 0.7 - 0.9, Top_p 0.8';
$string['caseuse_precise'] = 'Respuestas precisas => Temperatura 0.0 - 0.3, Top_p 1.0';
$string['clear_history_title'] = 'Limpiar todo el historial';
$string['close_title'] = 'Cerrar chat';
$string['frequency_penalty'] = 'Penalización de frecuencia';
$string['frequency_penalty_desc'] = 'Este parámetro se utiliza para disuadir al modelo de repetir las mismas palabras o frases con demasiada frecuencia en el texto generado. Es un valor añadido a la probabilidad logarítmica de un token cada vez que ocurre en el texto generado. Una penalización de frecuencia más alta hará que el modelo sea más conservador al usar tokens repetidos.';
$string['geniai:manage'] = 'Gestionar GeniAI';
$string['geniai:view'] = 'Ver GeniAI';
$string['geniainame'] = 'Nombre del asistente';
$string['geniainame_desc'] = 'Defina el nombre de su asistente';
$string['h5p-accordion-desc'] = 'Cree un glosario que permita a los estudiantes acceder rápidamente a las respuestas sin verse abrumados por un texto excesivo.';
$string['h5p-accordion-title'] = 'Glosario';
$string['h5p-advancedtext-desc'] = 'Cree un libro digital a partir de su contenido, organizándolo en capítulos de una manera lógica y atractiva para asegurar una división del material cohesiva y cautivadora.';
$string['h5p-advancedtext-title'] = 'Libro digital';
$string['h5p-block-title'] = 'Título del bloque';
$string['h5p-create'] = 'Crear H5P con GeniAI';
$string['h5p-create-new'] = 'Crear nuevo H5P con GeniAI';
$string['h5p-create-this'] = 'Crear con este recurso';
$string['h5p-create-title'] = 'Título de H5P';
$string['h5p-create-title-desc'] = 'Defina el título principal para el contenido H5P que se mostrará a los usuarios en la interfaz.';
$string['h5p-createpage-title'] = 'Crear nuevo {$a}';
$string['h5p-crossword-desc'] = 'Cree un juego de crucigramas interactivo para involucrar a los estudiantes, utilizando palabras clave de su contenido para promover un aprendizaje divertido y dinámico.';
$string['h5p-crossword-title'] = 'Crucigrama';
$string['h5p-delete-success'] = '¡H5P eliminado con éxito!';
$string['h5p-dialogcards-desc'] = 'Cree tarjetas de memoria que actúen como ejercicios interactivos para ayudar a los estudiantes a memorizar palabras, frases o conceptos clave de los textos. En el frente de cada tarjeta hay una pista o indicación y, al voltearla, el estudiante revela la información correspondiente. Estas tarjetas pueden usarse en el aprendizaje de idiomas, la resolución de problemas matemáticos o para ayudar a los estudiantes a memorizar hechos importantes como eventos históricos, fórmulas o nombres.';
$string['h5p-dialogcards-title'] = 'Tarjetas de memoria (Flashcards)';
$string['h5p-dragtext-desc'] = 'Cree un juego de "Arrastrar las palabras" donde el estudiante debe arrastrar la parte faltante del texto a su lugar correcto, formando una expresión completa. Este juego puede usarse para evaluar si el estudiante recuerda el contenido que leyó o comprende lo que se cubrió. Además, ayuda al estudiante a reflexionar más profundamente sobre el texto, promoviendo una mejor asimilación del contenido.';
$string['h5p-dragtext-title'] = 'Juego de arrastrar palabras';
$string['h5p-example'] = 'Ver ejemplo';
$string['h5p-findthewords-desc'] = 'Cree un juego de sopa de letras donde los estudiantes deben encontrar y seleccionar palabras en una cuadrícula basándose en una lista proporcionada.';
$string['h5p-findthewords-title'] = 'Juego de sopa de letras';
$string['h5p-interactivebook-desc'] = 'Cree un Libro Interactivo que combine diversos contenidos interactivos, como videos interactivos, glosarios, cuestionarios, actividades de arrastrar y soltar, crucigramas, sopas de letras y más, organizados en varias páginas. Añada un resumen al final que muestre la puntuación total que el estudiante obtuvo a lo largo del libro.';
$string['h5p-interactivebook-title'] = 'Libro interactivo';
$string['h5p-interactivevideo-desc'] = 'Cree un video interactivo con capítulos y un glosario que resalte los puntos clave del contenido. Al final, añada un resumen interactivo para reforzar el aprendizaje y repasar los temas tratados.';
$string['h5p-interactivevideo-title'] = 'Video interactivo';
$string['h5p-manager'] = 'Gestionar H5P con GeniAI';
$string['h5p-manager-scorm'] = 'Gestionar SCORM con GeniAI';
$string['h5p-next-step'] = 'Siguiente paso';
$string['h5p-no-apikey'] = '<p>Configurar la clave API de ChatGPT es necesario para que el sistema de creación de cuentas funcione correctamente. Esto permitirá que el sistema se comunique con ChatGPT para realizar las operaciones requeridas durante el proceso de creación de la cuenta.<p><p><a href="{$a}">Haga clic aquí para configurar la clave API de ChatGPT.</a></p>';
$string['h5p-page-title'] = 'Crear un H5P con GeniAI';
$string['h5p-questionset-desc'] = 'Cree un conjunto de preguntas que permita a los estudiantes resolver una secuencia de diversas preguntas, incluyendo tipos como opción múltiple y verdadero/falso, ofreciendo una experiencia interactiva y desafiante.';
$string['h5p-questionset-title'] = 'Cuestionarios';
$string['h5p-readmore'] = '...más';
$string['h5p-return'] = 'Volver al banco de contenido';
$string['h5p-title'] = 'Gestionar el banco de contenido de GeniAI';
$string['max_tokens'] = 'Máximo de palabras en la respuesta';
$string['max_tokens_desc'] = 'Número máximo de palabras que se pueden generar en cada solicitud.';
$string['message_01'] = '¡Hola, {$a}! 🌟';
$string['message_02'] = '¡Bienvenido al curso {$a->coursename} en Moodle {$a->moodlename}!
Soy {$a->geniainame} y estoy aquí para hacer que su viaje de aprendizaje sea lo más increíble posible.
¿Cómo puedo ayudarle hoy? 🌟📚';
$string['mode'] = 'Modo de uso';
$string['mode_desc'] = 'Defina qué modo de uso desea para el globo';
$string['mode_name_geniai'] = 'Tutor GeniAI';
$string['mode_name_none'] = 'Sin globo de chat';
$string['model'] = 'El modelo de API';
$string['model_desc'] = 'El modelo de API a ejecutar en OpenAI. Los valores disponibles se encuentran en el <a href="https://platform.openai.com/docs/models/overview" target="_blank">sitio web de OpenAI</a><br>
* <strong>gpt-4</strong>: Mucho más potente, ligeramente más caro, tarda un poco más en responder y requiere un <a href="https://help.openai.com/en/articles/7102672-how-can-i-access-gpt-4" target="_blank">pago anticipado de $1</a> para probar.<br>
* <strong>gpt-4o-mini</strong>: Menos potente que gpt-4, pero más rápido y barato. No se requiere pago anticipado.';
$string['modulename'] = 'GeniAI';
$string['modules'] = 'Módulos a ocultar de {$a}';
$string['modules_desc'] = 'Esta lista contiene los módulos que no deben estar disponibles para los estudiantes, asegurando que no se utilicen en los ejercicios.';
$string['online'] = 'En línea';
$string['pluginname'] = 'GeniAI';
$string['presence_penalty'] = 'Penalización de presencia';
$string['presence_penalty_desc'] = 'Este parámetro se utiliza para animar al modelo a incluir una variedad de tokens en el texto generado. Es un valor que se resta de la probabilidad logarítmica de un token cada vez que se genera. Un valor de penalización de presencia más alto hará que el modelo tenga más probabilidades de generar tokens que aún no se han incluido en el texto generado.';
$string['privacy:metadata'] = 'El plugin GeniAI almacena el historial de conversaciones y transmite solo el nombre completo, el nombre del curso y la URL a OpenAI, sin compartir ningún otro dato personal.';
$string['report_completion_tokens'] = 'Número de tokens recibidos';
$string['report_datecreated'] = 'Día';
$string['report_filename'] = 'Informe de uso de asistencia de GPT';
$string['report_info'] = '<p>En el informe presentado, solo están disponibles las primeras 100 líneas. Para acceder a todos los registros, descargue el documento completo.</p><p>En cuanto a los tokens, una regla general es que un token corresponde aproximadamente a unos 4 caracteres de texto común en inglés. Esto equivale a aproximadamente ¾ de una palabra (por lo tanto, 100 tokens ~= 75 palabras). Obtenga más información en la página de <a href="https://platform.openai.com/tokenizer" target="_blank">Tokenización del modelo de lenguaje</a>.</p>';
$string['report_model'] = 'Modelo de ChatGPT';
$string['report_prompt_tokens'] = 'Número de tokens enviados';
$string['report_title'] = 'Informe';
$string['send_message'] = 'Enviar mensaje';
$string['settings'] = 'Configurar GeniAI';
$string['settings_casedesc'] = 'Los parámetros de temperatura y Top_p definidos para cada escenario, como la generación de texto y código, escritura creativa, chatbot, generación de comentarios textuales, análisis de datos y escritura exploratoria. Cada configuración afecta la creatividad y la coherencia del modelo en la generación de contenido.<br><br>Consulte la tabla siguiente para obtener orientación sobre el uso de Temperatura y Top_p:<br>';
$string['settings_casedesc_balancedresp'] = 'Respuestas equilibradas';
$string['settings_casedesc_balancedresp_desc'] = 'Respuestas equilibradas entre precisión y creatividad. Ideal para conversaciones naturales y amistosas.';
$string['settings_casedesc_caseuse'] = 'Caso de uso';
$string['settings_casedesc_chatbot'] = 'Chatbot';
$string['settings_casedesc_chatbot_desc'] = 'Respuestas rápidas, consistentes y contextuales para la interacción en tiempo real con los usuarios.';
$string['settings_casedesc_creativegen'] = 'Generación creativa';
$string['settings_casedesc_creativegen_desc'] = 'Produce respuestas más creativas, originales o exploratorias. Útil para la lluvia de ideas o la narración de historias.';
$string['settings_casedesc_description'] = 'Descripción';
$string['settings_casedesc_formaltones'] = 'Tonos formales';
$string['settings_casedesc_formaltones_desc'] = 'Crea textos más formales o técnicos con menos variación creativa.';
$string['settings_casedesc_optionexplore'] = 'Exploración de opciones';
$string['settings_casedesc_optionexplore_desc'] = 'Genera múltiples respuestas alternativas para considerar diferentes enfoques de una pregunta.';
$string['settings_casedesc_preciseresp'] = 'Respuestas precisas';
$string['settings_casedesc_preciseresp_desc'] = 'Máxima precisión y previsibilidad. Recomendado para tareas técnicas o informativas.';
$string['settings_casedesc_relaxedtones'] = 'Tonos relajados';
$string['settings_casedesc_relaxedtones_desc'] = 'Genera textos más ligeros e informales con un enfoque creativo y amistoso.';
$string['settings_casedesc_temperature'] = 'Temperatura';
$string['settings_casedesc_top_p'] = 'Top_p';
$string['talk_geniai'] = 'Hable con {$a} aquí';
$string['write_message'] = 'Escriba un mensaje...';
