![image](https://github.com/sebamon/octopus-proptech/assets/2036101/76b26030-9969-4305-99b5-3a550831713c)## Octopus Proptech Challenge

Aplicación desarrollada en con Laravel 11, permite la creación de facturas (Invoices) asociando los diferentes servicios disponibles.

### Requisitos


#### Para Windows
- Composer
- Postgress

### Recomendación
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



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
