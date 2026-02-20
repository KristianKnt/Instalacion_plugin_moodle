EduLabs AI – Plugin Moodle
-Descripción

Este proyecto consiste en el desarrollo de un plugin local para Moodle LMS que integra un chatbot basado en la API de OpenAI (ChatGPT).
El plugin fue creado y personalizado con el objetivo de mejorar la interacción de los usuarios dentro de la plataforma y automatizar la creación de cursos mediante inteligencia artificial.

-Funcionalidades implementadas
-Integración de chatbot con OpenAI

En primer lugar, desarrollé un plugin que se conecta con la API de OpenAI, permitiendo que los usuarios de Moodle puedan interactuar directamente con un chatbot desde la plataforma.

Las principales características de esta funcionalidad son:

Comunicación en tiempo real con el modelo de OpenAI.

Respuesta a preguntas realizadas por los usuarios.

Interfaz integrada dentro de Moodle.

-Personalización visual del chatbot (Look & Feel)

En segundo lugar, el chatbot fue personalizado visualmente para adaptarse a la identidad gráfica de Edu Labs.

Los cambios realizados incluyen:

Ajuste de colores corporativos requeridos por Edu Labs.

Modificación del estilo visual del chatbot para mantener coherencia con la plataforma.

Mejora de la experiencia de usuario a nivel visual.

-Creación automática de cursos mediante prompts

Como tercera funcionalidad, se configuró el chatbot para que sea capaz de crear cursos automáticamente en Moodle a partir de un prompt digitado por el usuario.

El flujo de esta funcionalidad es el siguiente:

El usuario solicita al chatbot la creación de un curso indicando:

Tema del curso.

Duración en semanas.

Breve descripción.

El chatbot procesa la solicitud utilizando la API de OpenAI.

Con la información generada, el plugin crea el curso en Moodle, incluyendo:

Nombre del curso.

Descripción del curso.

Estructura de semanas (introducción, contenido y cierre).

Antes de ejecutar la creación del curso, el sistema verifica que el usuario tenga el rol de profesor y/o administrador, garantizando que solo usuarios autorizados puedan realizar esta acción.

-Control de roles y permisos

Para asegurar el uso correcto del sistema:

Se valida el rol del usuario antes de permitir la creación de cursos.

Los estudiantes no tienen acceso a esta funcionalidad.

Se utilizan las capacidades y roles propios de Moodle para el control de permisos.

-Pruebas realizadas

Pruebas de interacción con el chatbot.

Pruebas de personalización visual.

Pruebas de creación de cursos con distintos prompts.

Validación de restricciones por rol (administrador, profesor y estudiante).

Adicionalmente se crea un archivo para poder agregar un segundo idioma en este caso español para asi dejar funcionando la integracion de los idiomas 

-Conclusión

El plugin EduLabs AI permite integrar inteligencia artificial dentro de Moodle de forma práctica, mejorando la experiencia de los usuarios y automatizando procesos clave como la creación de cursos, siempre respetando los permisos y roles definidos en la plataforma.
