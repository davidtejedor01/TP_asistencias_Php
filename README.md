<h1 align="center">Sistema de Gestión de Asistencia de Alumnos</h1>

## Descripción del Proyecto

Este repositorio contiene el **Trabajo Práctico Final** desarrollado para la materia **PISWD** (Proyecto de Implementación de Sitios Web Dinámicos).

El proyecto es un sistema backend simple diseñado para la intranet escolar que permite a los docentes registrar la asistencia/ausencia de los alumnos. El sistema utiliza PHP para la lógica de servidor y MySQL para la gestión de la base de datos.

## Tecnologías Utilizadas

* **Lenguaje de Backend:** PHP
* **Base de Datos:** MySQL
* **Frontend:** HTML5, CSS3

## Estructura del Repositorio

La estructura del proyecto está organizada en carpetas funcionales y archivos principales:

### `📁 css`
Contiene el archivos de hoja de estilo (CSS) responsable de la presentación y el diseño de la interfaz.

* `style.css`: Estilos principales encargados de darle al formulario de asistencia una presentación y diseño amigables.

### `📁 php`
Esta carpeta contiene los *scripts* de servidor que manejan la lógica principal de la aplicación.

* `conexion.php`: **Conexión a la Base de Datos.**
    * Establece la conexión con la base de datos MySQL (`asistencia_db`) utilizando la extensión `mysqli`.
    * Define las credenciales de acceso. Incluye un manejo básico de errores si la conexión falla.

* `funciones.php`: **Librería de Funciones.**
    * Implementa la función `leerAlumnos()`: Ejecuta una consulta SQL para recuperar la `matricula`, `nombre` y `apellido` de todos los alumnos, ordenados alfabéticamente por apellido y nombre.

* `GeneraArchivo.php`: **Procesamiento de Asistencia.**
    * **Función:** Es el encargado de recibir los datos del formulario (`POST`).
    * **Lógica:** Recibe la fecha y el listado de alumnos presentes. Itera sobre todos los alumnos para determinar su estado ('P' o 'A'). Utiliza **consultas preparadas** para insertar el registro de asistencia (`alumno_id`, `fecha`, `estado`) en la tabla `asistencias` y, finalmente, redirecciona al usuario al formulario principal.

### `📁 sql`
Contiene los *scripts* SQL para la configuración inicial y relleno de la base de datos.

* `crear_db.sql`: Contiene las instrucciones para construir la base de datos (`asistencia_db`) y sus respetivas tablas: (`asistencias`) y (`alumnos`) .
* `insertar_datos.sql`: Contiene la instruccion (`INSERT INTO`) para añadir datos de prueba o la lista inicial de alumnos.

### `Archivo Principal`

* `Asistencia.php`: **Formulario Principal de Asistencia (Interfaz de Usuario).**
    * **Función:** Es la página que visualiza el docente. Contiene la estructura HTML del formulario.
    * **Lógica PHP:** Incluye `php/funciones.php` y utiliza la función `leerAlumnos()` para precargar y generar dinámicamente el listado de estudiantes con sus respectivos *checkboxes*.

## Despliegue y Uso

### 1. Requisitos
* Servidor Web con soporte para **PHP** (ej. XAMPP).
* Servidor de Base de Datos **MySQL**.

### 2. Instalación
1.  Clona el repositorio: `git clone https://www.youtube.com/watch?v=4pwMbHQFoE8`
2.  Importa la Base de Datos:
    * Crea una base de datos con el nombre `asistencia_db` en tu servidor MySQL.
    * Importa el archivo `sql/crear_db.sql`.
    * Importa el archivo `sql/insertar_datos.sql` para añadir datos de prueba.
3.  Configura la conexión: Abre `php/conexion.php` y si es necesario, actualiza las credenciales de la base de datos (usuario, contraseña, nombre de la DB).
4.  Coloca todos los archivos en el directorio raíz de tu servidor web.

### 3. Ejecución
* Abre tu navegador y navega a la URL del proyecto: `http://localhost/Asistencia.php` (o la dirección correspondiente a tu servidor local).
