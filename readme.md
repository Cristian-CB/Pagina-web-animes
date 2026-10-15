# Proyecto PHP: Aplicación web completa

## 1. Descripción del proyecto

Desarrolla una aplicación web completa utilizando los conocimientos adquiridos hasta ahora en PHP, HTML, CSS, formularios, sesiones y control de acceso.

Elige una de las siguientes temáticas:

- Series / Anime
- Deportes
- Restaurante / Carta

La aplicación tendrá **páginas públicas**, accesibles para cualquier visitante, y **páginas privadas**, a las que solo se podrá acceder después de iniciar sesión. Además, existirán diferentes permisos según el rol del usuario: `USER` y `ADMIN`.

## 2. Estructura de archivos

Organiza el proyecto con la siguiente estructura:

```text
proyecto/
├── index.php
├── catalogo.php
├── login.php
├── dashboard.php
├── add_item.php
├── config.php
├── data.php
├── style.css
├── controllers/
│   ├── middleware.php
│   ├── logout.php
│   └── tarjeta.php
├── partials/
│   ├── header.php
│   ├── nav.php
│   └── footer.php
└── img/
```

## 3. Configuración y datos

### config.php

Define al menos **3 constantes globales** utilizando `define()` o `const`. Por ejemplo:

- Nombre de la aplicación.
- Versión.
- Ruta de las imágenes.

Este archivo debe importarse en todas las páginas y cargarse antes que el resto de los archivos del proyecto.

### data.php

Crea los arrays necesarios para almacenar los datos de la aplicación.

**Array de elementos:**
- Mínimo 6 elementos.
- Cada elemento debe tener un identificador (`id`), un título o nombre, una imagen, un campo `destacado` (`true` o `false`) y al menos 4 campos adicionales propios de la temática.

**Array de usuarios:**
- Mínimo 3 usuarios.
- Debe existir al menos un usuario con rol `ADMIN` y otro con rol `USER`.
- Cada usuario debe tener, como mínimo, nombre de usuario, contraseña y rol.

### Función para pintar tarjetas

Crea en `controllers/tarjeta.php` una función propia que reciba un elemento y genere su tarjeta HTML.

La función debe mostrar la imagen, el título y los campos relevantes del elemento. Se utilizará tanto en `index.php` como en `catalogo.php` para evitar repetir código.

## 4. Componentes compartidos

Los archivos de `partials/` contendrán los elementos comunes de la aplicación y deberán incluirse en las páginas correspondientes mediante `require` o `include`.

### header.php
Contiene la cabecera común e inicia la sesión mediante `session_start()`, centralizando así el inicio de sesión en este archivo.

### nav.php
Contiene el menú de navegación, que cambiará según el estado de la sesión y el rol del usuario:

- **Sin sesión:** Inicio, Catálogo y Login.
- **Usuario USER:** Inicio, Catálogo, Dashboard y Logout.
- **Usuario ADMIN:** Inicio, Catálogo, Dashboard, Añadir elemento y Logout.

Como punto extra, muestra el nombre del usuario cuando haya iniciado sesión.

### footer.php
Contiene el pie de página con el nombre de la aplicación y los datos o enlaces que quieras añadir.

## 5. Páginas de la aplicación

### index.php — Página de inicio

- Incluye `config.php`, `data.php` y los componentes compartidos.
- Muestra el título y una breve descripción de la aplicación.
- Muestra únicamente los elementos cuyo campo `destacado` sea `true`.
- Utiliza la función de tarjetas para representar los elementos.

### catalogo.php — Catálogo completo

- Muestra todos los elementos del catálogo mediante la función de tarjetas.
- Añade una sección que filtre los elementos por alguna categoría propia de la temática elegida.
- Como punto extra, muestra el número total de elementos de cada categoría.

### login.php — Inicio de sesión

- Contiene un formulario con los campos `username` y `password`.
- Envía los datos mediante `POST` a `controllers/middleware.php`.
- Si existe `$_GET["error"]`, muestra un mensaje de error visible para el usuario.

### dashboard.php — Área privada

- Comprueba que exista una sesión activa. Si no existe, redirige a `login.php`.
- Muestra un mensaje de bienvenida con el nombre de usuario y su rol.
- Muestra el número total de elementos del catálogo.
- Si el usuario es `ADMIN`, muestra un enlace a `add_item.php`.

### add_item.php — Añadir elemento (solo ADMIN)

- Comprueba que exista una sesión activa y que el usuario tenga el rol `ADMIN`.
- Si no hay sesión, redirige a `login.php`.
- Si hay sesión, pero el usuario no es administrador, redirige a `dashboard.php`.
- Contiene un formulario con todos los campos necesarios para crear un elemento.
- El formulario envía los datos mediante `POST` al mismo archivo.
- Tras recibir los datos, muestra el elemento en pantalla utilizando el mismo diseño de tarjeta que el catálogo.

## 6. Controladores

### controllers/middleware.php — Procesamiento del login

- Solo acepta peticiones `POST`. Si se accede mediante `GET`, redirige a `index.php`.
- Incluye `data.php` para acceder al array de usuarios.
- Busca el usuario y comprueba que la contraseña sea correcta.
- Si las credenciales son válidas, guarda el nombre de usuario y el rol en la sesión y redirige a `dashboard.php`.
- Si las credenciales son incorrectas, redirige a `login.php?error=1`.

### controllers/logout.php — Cierre de sesión

- Inicia la sesión con `session_start()`.
- Destruye la sesión mediante `session_destroy()`.
- Redirige a `index.php`.

## 7. Requisitos técnicos

- Utiliza `<?= ?>` para mostrar valores en el HTML y `<?php ?>` para la lógica PHP.
- Coloca la lógica de procesamiento y las comprobaciones antes del HTML de cada archivo.
- Centraliza `session_start()` en `partials/header.php`, salvo en los controladores que necesiten gestionar la sesión de forma independiente.
- Utiliza `require` o `include` para reutilizar archivos y componentes.
- Separa todos los estilos en un archivo `style.css`.
- Comprueba los permisos antes de mostrar o procesar contenido privado.
- Utiliza las redirecciones para impedir el acceso a páginas no autorizadas.

## 8. Puntos extra

- Diseño cuidado con tarjetas, sombras, bordes redondeados y efectos `hover`.
- Mostrar en `add_item.php` los datos recibidos con el mismo diseño de tarjeta que el catálogo.
- Mostrar el nombre del usuario conectado en el menú de navegación.
- Mostrar en `catalogo.php` el número de elementos que hay en cada categoría.

## 9. Entrega

Entrega el proyecto completo en un archivo `.zip` que incluya todos los archivos PHP, la hoja de estilos, los controladores, los componentes compartidos y la carpeta `img/` con las imágenes utilizadas.