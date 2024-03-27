## Octopus Proptech Challenge

Aplicación desarrollada en con Laravel 11, permite la creación de facturas (Invoices) asociando los diferentes servicios disponibles.

### Requisitos


#### Para Windows
- Composer
- Postgress

### Recomendación
- Docker
- Wsl (Subsistema de Windows para Linux)
- Composer
## Instalación Windows

Clonar el repositorio:
```bash
git clone https://github.com/sebamon/octopus-proptech.git
```
Ingresar a la carpeta:
```bash
cd octopus-proptech
```
Instalar dependencias:
```bash
composer install
```
Generar key:
```bash
php artisan key:generate
```

## Instalación WSL

Clonar el repositorio:
```bash
git clone https://github.com/sebamon/octopus-proptech.git
```
Ingresar a la carpeta:
```bash
cd octopus-proptech
```
Instalar imagen del contenedor
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Instalar Sail
```bash
composer require laravel/sail --dev
```

Crear los contenedores
```bash
docker-compose up -d
```

## Configurar variables de entorno

Renombar .env.example por .env

## Posibles errores

Error de permisos
```bash
chmod -R 775 storage
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
