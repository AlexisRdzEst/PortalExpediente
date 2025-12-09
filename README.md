# Portal de Proveedores

Este proyecto es una aplicación web diseñada para la gestión y recepción de expedientes digitales de proveedores. Permite a los usuarios registrarse, iniciar sesión y cargar documentación fiscal y legal requerida de manera organizada e intuitiva.

## 🚀 Características Principales

* **Autenticación de Usuarios:** Sistema seguro de Registro y Login.
* **Gestión de Expedientes:** Carga de documentos específicos requeridos para proveedores (Personas Morales/Físicas).
* **Validación de Documentos:** Interfaz para subir archivos como:
    * Acta Constitutiva
    * Constancia de Situación Fiscal
    * Opinión de Cumplimiento (32D e IMSS)
    * Identificaciones y Comprobantes de Domicilio.
* **Interfaz Reactiva:** Experiencia de usuario fluida sin recargas de página completas.

## 🛠️ Tecnologías Utilizadas

Este proyecto está construido con un stack moderno y robusto:

* **Backend:** [Laravel 10](https://laravel.com) - Framework de PHP.
* **Frontend:** [Vue.js 3](https://vuejs.org) (Composition API) - Framework de JavaScript.
* **SPA Bridge:** [Inertia.js](https://inertiajs.com) - Conexión entre Laravel y Vue sin necesidad de API compleja.
* **Estilos:** [Tailwind CSS](https://tailwindcss.com) - Framework de utilidades CSS.
* **Build Tool:** [Vite](https://vitejs.dev) - Empaquetador de módulos rápido.

## 📋 Requisitos Previos

Asegúrate de tener instalado lo siguiente en tu entorno local:

* PHP >= 8.1
* Composer
* Node.js & NPM

## ⚙️ Instalación y Configuración

Sigue estos pasos para levantar el proyecto en tu entorno local:

1.  **Clonar el repositorio**
    ```bash
    git clone [https://github.com/tu-usuario/portal-expediente.git](https://github.com/tu-usuario/portal-expediente.git)
    cd portal-expediente
    ```

2.  **Instalar dependencias de PHP**
    ```bash
    composer install
    ```

3.  **Instalar dependencias de JavaScript**
    ```bash
    npm install
    ```

4.  **Configurar variables de entorno**
    Duplica el archivo de ejemplo y renómbralo:
    ```bash
    cp .env.example .env
    ```
    Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

5.  **Configurar Base de Datos**
    Abre el archivo `.env`, configura tus credenciales de base de datos (`DB_DATABASE`, `DB_USERNAME`, etc.) y corre las migraciones:
    ```bash
    php artisan migrate
    ```

6.  **Ejecutar el servidor de desarrollo**
    Necesitarás dos terminales:

    *Terminal 1 (Laravel):*
    ```bash
    php artisan serve
    ```

    *Terminal 2 (Vite):*
    ```bash
    npm run dev
    ```

7.  **Acceso**
    Abre tu navegador en `http://127.0.0.1:8000`.

## 📂 Estructura del Proyecto

* `app/Models`: Modelos de datos (Eloquent).
* `app/Http/Controllers`: Lógica del backend.
* `resources/js/Pages`: Vistas principales de la aplicación (Componentes Vue).
* `resources/js/Components`: Componentes reutilizables (Botones, Inputs, Tablas).
* `resources/js/Layouts`: Estructuras de diseño base.
* `routes/web.php`: Definición de rutas de la aplicación.

## 🔒 Seguridad

Si descubres alguna vulnerabilidad de seguridad, por favor contacta al equipo de desarrollo en lugar de abrir un issue público.

---
Desarrollado para **The Fuentes Corporation**.
