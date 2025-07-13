# DECRETA (Esqueleto)

Este proyecto provee una estructura básica para comenzar el desarrollo del sistema **DECRETA**. Incluye un inicio de sesión sencillo, módulos de ejemplo y componentes reutilizables.

## Estructura
- `includes/` componentes comunes como cabecera, pie de página y conexión a base de datos
- `modulos/` cada módulo independiente
- `assets/` archivos estáticos

## Uso
1. Configure la base de datos en `includes/db.php`.
2. Cree la tabla `usuarios` y un usuario con contraseña hasheada.
3. Inicie el servidor PHP `php -S localhost:8000` y acceda a `http://localhost:8000`.

Este repositorio es una base mínima; queda pendiente implementar el resto de módulos y características descritas en la documentación del sistema.
