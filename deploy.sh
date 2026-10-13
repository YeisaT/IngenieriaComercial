#!/bin/bash
# =============================================================
# SCRIPT DE DEPLOY — Ingeniería Comercial FCEE · U.A.G.R.M.
# Ejecutar en el servidor de producción después de subir el código
# =============================================================

set -e  # Detener si cualquier comando falla

echo "🚀 Iniciando deploy..."

# 1. Modo mantenimiento ON
php artisan down --message="Actualizando el sitio, volvemos en un momento." --retry=60

# 2. Instalar dependencias PHP (sin dev)
composer install --no-dev --optimize-autoloader --no-interaction

# 3. Limpiar y optimizar caché
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# 4. Ejecutar migraciones
php artisan migrate --force

# 5. Ejecutar seeders solo si la tabla noticias está vacía
NOTICIAS=$(php artisan tinker --execute="echo \App\Models\Noticia::count();" 2>/dev/null | tail -1)
if [ "$NOTICIAS" = "0" ]; then
    echo "📦 Cargando datos iniciales..."
    php artisan db:seed --force
fi

# 6. Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Permisos correctos en storage y cache
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# 8. Modo mantenimiento OFF
php artisan up

echo "✅ Deploy completado exitosamente."
