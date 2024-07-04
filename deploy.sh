#!/bin/bash

set -e

echo "Iniciando el despliegue del proyecto Laravel..."

# Verificar si Docker y docker-compose esta intalado
if ! command -v docker &> /dev/null
then
    echo "Docker no está instalado. Por favor, instala Docker y Docker Compose antes de continuar."
    exit 1
fi

if ! command -v docker-compose &> /dev/null
then
    echo "Docker Compose no está instalado. Por favor, instálalo antes de continuar."
    exit 1
fi

# Construir e iniciar los contenedores
echo "Construyendo e iniciando los contenedores..."
docker-compose up -d --build

# Esperar a que los contenedores estén listos
echo "Esperando a que los contenedores estén listos..."
sleep 10

# Instalar dependencias de Composer
echo "Instalando dependencias de Composer..."
docker-compose exec -T trainee-app composer install

# Copiar el archivo .env
echo "Configurando el archivo .env..."
docker-compose exec -T trainee-app cp .env.example .env

# Generar la clave de la aplicación
echo "Generando la clave de la aplicación..."
docker-compose exec -T trainee-app php artisan key:generate


# Ejecutar las migraciones
echo "Ejecutando las migraciones de la base de datos..."
docker-compose exec -T trainee-app php artisan migrate --force

# Instalar dependencias de npm y compilar assets
echo "Instalando dependencias de npm y compilando assets..."
docker-compose exec -T trainee-app npm install
docker-compose exec -T trainee-app npm run build

# Ajustar permisos
echo "Ajustando permisos..."
docker-compose exec -T trainee-app chown -R www-data:www-data /var/www/html
docker-compose exec -T trainee-app chmod -R 775 /var/www/html/storage/logs/
docker-compose exec -T trainee-app chown -R www-data:www-data /var/www/html/storage/logs/

echo "¡Despliegue completado! La aplicación debería estar disponible en http://localhost:8000"