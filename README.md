# SIRA - Sistema de Registro de Aspirantes

SIRA es un sistema desarrollado en Laravel para gestionar el registro de aspirantes a diferentes programas académicos. Este proyecto permite la gestión de convocatorias, programas educativos, aspirantes, proporcionando una plataforma  para manejar el proceso de admisión en el Laboratorio Nacional de Informática Avanzada.

## Características

- Gestión de programas educativos y convocatorias
- Registro y autenticación de usuarios
- Integración con JWT para autenticación
- Sistema de roles
- Soporte para subir y gestionar documentos

## Tecnologías Utilizadas

- **Laravel**: Framework PHP para el backend
- **PostgreSQL**: Base de datos 
- **JWT**: Autenticación segura
- **Git**: Control de versiones

## Requisitos Previos

- PHP >= 8.0
- Composer
- PostgreSQL
- Git

## Instalación

Sigue estos pasos para configurar el proyecto.

1. Clonar el repositorio:

    ```bash
    git clone https://github.com/rafa2014/SIRA.git
    ```

2. Ir al directorio del proyecto:

    ```bash
    cd SIRA
    ```

3. Instalar las dependencias de PHP con Composer:

    ```bash
    composer install
    ```

4. Crear el archivo `.env` a partir del ejemplo y configurar la base de datos y otras variables de entorno:

    ```bash
    cp .env.example .env
    ```

5. Generar la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```

6. Migrar las tablas de la base de datos y ejecutar los seeders:

    ```bash
    php artisan migrate --seed
    ```
## Uso

### Iniciar el Servidor

Puedes iniciar un servidor de desarrollo local ejecutando:

```bash
php artisan serve
