# Ingeniería Comercial — FCEE · U.A.G.R.M.

Sitio web institucional de la Carrera de Ingeniería Comercial.

---

## Requisitos del servidor

| Requisito | Versión mínima |
|-----------|---------------|
| PHP       | 8.2+          |
| MySQL     | 8.0+          |
| Composer  | 2.x           |
| Apache / Nginx | Cualquiera |

---

## Instalación local (desarrollo)

```bash
# 1. Clonar el repositorio
git clone <url-del-repo> ingenieria-comercial
cd ingenieria-comercial

# 2. Instalar dependencias PHP
composer install

# 3. Copiar y configurar el .env
cp .env.example .env
php artisan key:generate

# 4. Editar .env con tus credenciales de base de datos
# DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 5. Crear la base de datos en MySQL
mysql -u root -p -e "CREATE DATABASE ingenieria_comercial CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 6. Ejecutar migraciones y seeders
php artisan migrate
php artisan db:seed

# 7. Levantar servidor local
php artisan serve
```

Abre http://localhost:8000

---

## Deploy a producción

### Paso 1 — Preparar el servidor

Configura el virtual host de Apache/Nginx apuntando a la carpeta `public/`.

**Nginx:**
```nginx
server {
    listen 80;
    server_name tu-dominio.com;
    root /var/www/ingenieria-comercial/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

**Apache** (el `.htaccess` ya está incluido en `public/`).

### Paso 2 — Subir el código

```bash
git clone <url-del-repo> /var/www/ingenieria-comercial
cd /var/www/ingenieria-comercial
```

### Paso 3 — Configurar el .env de producción

```bash
cp .env.example .env
nano .env
```

Valores clave a cambiar:
```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com
DB_DATABASE=ingenieria_comercial
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password_seguro
```

### Paso 4 — Ejecutar el script de deploy

```bash
chmod +x deploy.sh
./deploy.sh
```

Esto ejecuta automáticamente:
- `composer install --no-dev`
- Limpieza de caché
- Migraciones
- Seeders (solo si la BD está vacía)
- Optimización de config/rutas/vistas

---

## Imágenes requeridas

Coloca estas imágenes en `public/img/`:

| Archivo | Descripción |
|---------|-------------|
| `logo.jpg` | Logo de la carrera |
| `MallaCurricular.jpg` | Imagen de la malla curricular |
| `ModuloComercial.jpg` | Foto del edificio (hero) |

---

## Estructura del proyecto

```
app/
  Http/Controllers/HomeController.php   ← Controlador principal
  Models/                               ← Modelos Eloquent
database/
  migrations/                           ← Estructura de tablas
  seeders/                              ← Datos iniciales
public/
  css/styles.css                        ← Estilos personalizados
  js/app.js                             ← Lógica JS (scroll, nav)
  js/slider.js                          ← Carrusel de noticias
  img/                                  ← Imágenes del sitio
resources/views/
  welcome.blade.php                     ← Vista principal
  partials/                             ← Secciones de la página
  errors/                               ← Páginas de error
routes/web.php                          ← Rutas
```

---

## Comandos útiles en producción

```bash
# Activar modo mantenimiento
php artisan down

# Desactivar modo mantenimiento
php artisan up

# Limpiar toda la caché
php artisan optimize:clear

# Re-optimizar después de cambios
php artisan optimize

# Ver logs de error
tail -f storage/logs/laravel-$(date +%Y-%m-%d).log
```
