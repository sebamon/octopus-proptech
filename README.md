## ![image](https://www.octopus.com.ar/public/octopus/img/octopus_logo-innovacon.svg) Octopus Proptech Challenge


Aplicación desarrollada en con Laravel 11, permite la creación de facturas (Invoices) asociando los diferentes servicios disponibles.

### Requisitos
- Docker
- Wsl (Subsistema de Windows para Linux)
- Composer

## Instalación WSL

Clonar el repositorio:
```bash
git clone https://github.com/sebamon/octopus-proptech.git
```
Ingresar a la carpeta:
```bash
cd octopus-proptech
```
Crear .env
```bash
cp .env.example .env
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
Otorgar permisos
```bash
sudo chmod -R 777 storage/
```
Generar alias sail
```bash
alias sail='./vendor/bin/sail'
```

Levantar contenedor Sail
```bash
sail up -d
```
Instalar dependencias
```bash
sail composer install
sail npm install
```

Crear key de la app
```bash
sail artisan key:generate
```

Correr migraciones con seed
```bash
sail artisan migrate --seed
```

## Framework

![image](https://laravel.com/img/logomark.min.svg)  ![image](https://laravel.com/img/logotype.min.svg)

Este proyecto utiliza el framework Laravel 11, una herramienta poderosa y flexible para el desarrollo de aplicaciones web en PHP. Laravel proporciona una estructura sólida y conveniente para la construcción de aplicaciones modernas, permitiendo a los desarrolladores concentrarse en la lógica de negocio en lugar de preocuparse por detalles técnicos.

- **Sitio web**: [Laravel.com](https://laravel.com/)
- **Documentación oficial**: [Documentación de Laravel](https://laravel.com/docs/11.x)
- **Repositorio en GitHub**: [laravel/laravel](https://github.com/laravel/laravel)

¡Agradecimientos al equipo de Laravel y a la comunidad de desarrolladores por su continuo trabajo en este increíble framework!

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
