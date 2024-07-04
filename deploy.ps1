# Asegurarse de que el script se detenga si hay algún error
$ErrorActionPreference = "Stop"

Write-Host "Iniciando el despliegue del proyecto Laravel..."

# Verificar si docker y docker-compose esta instalado
if (!(Get-Command docker -ErrorAction SilentlyContinue)) {
    Write-Host "Docker no está instalado. Por favor, instala Docker Desktop antes de continuar."
    exit 1
}

if (!(Get-Command docker-compose -ErrorAction SilentlyContinue)) {
    Write-Host "Docker Compose no está instalado. Por favor, asegúrate de que Docker Desktop esté correctamente instalado."
    exit 1
}

# Construir e iniciar los contenedores
Write-Host "Construyendo e iniciando los contenedores..."
docker-compose up -d --build

# Esperar a que los contenedores estén listos
Write-Host "Esperando a que los contenedores estén listos..."
Start-Sleep -Seconds 10

# Instalar dependencias de Composer
Write-Host "Instalando dependencias de Composer..."
docker-compose exec -T trainee-app composer install

# Copiar el archivo .env
Write-Host "Configurando el archivo .env..."
docker-compose exec -T trainee-app cp .env.example .env

# Generar la clave de la aplicación
Write-Host "Generando la clave de la aplicación..."
docker-compose exec -T trainee-app php artisan key:generate

# Ejecutar las migraciones
Write-Host "Ejecutando las migraciones de la base de datos..."
docker-compose exec -T trainee-app php artisan migrate --force
docker-compose exec -T trainee-app php artisan db:seed --class=CategoriesTableSeeder
docker-compose exec -T trainee-app php artisan db:seed --class=TasksTableSeeder


# Instalar dependencias de npm y compilar assets
Write-Host "Instalando dependencias de npm y compilando assets..."
docker-compose exec -T trainee-app npm install
docker-compose exec -T trainee-app npm install -D tailwindcss postcss autoprefixer
docker-compose exec -T trainee-app npx tailwindcss init
docker-compose exec -T trainee-app npm install aos
docker-compose exec -T trainee-app npm run build

# Ajustar permisos
Write-Host "Ajustando permisos..."
docker-compose exec -T trainee-app chown -R www-data:www-data /var/www/html

Write-Host "¡Despliegue completado! La aplicación debería estar disponible en http://localhost:8000"