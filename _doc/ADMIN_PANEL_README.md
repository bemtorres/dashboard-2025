# Panel de Administración con Tailwind CSS

Este proyecto incluye un panel de administración completo construido con Laravel y Tailwind CSS.

## 🚀 Características

- **Dashboard principal** con estadísticas y métricas
- **Gestión de usuarios** con filtros y búsqueda
- **Configuración del sistema** con opciones avanzadas
- **Diseño responsive** que funciona en móviles y escritorio
- **Sidebar colapsible** para navegación fácil
- **Interfaz moderna** con Tailwind CSS
- **Middleware de seguridad** para proteger las rutas

## 📁 Estructura de Archivos

```
resources/views/admin/
├── layouts/
│   └── app.blade.php          # Layout principal del admin
├── dashboard.blade.php         # Dashboard principal
├── users/
│   └── index.blade.php        # Gestión de usuarios
└── settings.blade.php         # Configuración del sistema

app/Http/Controllers/Admin/
└── AdminController.php        # Controlador principal del admin

app/Http/Middleware/
└── AdminMiddleware.php        # Middleware de seguridad
```

## 🔧 Instalación y Configuración

### 1. Verificar dependencias

Asegúrate de que Tailwind CSS esté configurado correctamente:

```bash
npm install
npm run build
```

### 2. Configurar autenticación

El panel requiere autenticación. Asegúrate de tener configurado el sistema de autenticación de Laravel:

```bash
php artisan make:auth
```

### 3. Ejecutar migraciones

```bash
php artisan migrate
```

### 4. Crear un usuario administrador

Puedes usar el seeder o crear un usuario manualmente:

```bash
php artisan make:seeder AdminUserSeeder
```

## 🌐 Rutas Disponibles

| Ruta | Descripción |
|------|-------------|
| `/admin` | Dashboard principal |
| `/admin/dashboard` | Dashboard principal |
| `/admin/users` | Gestión de usuarios |
| `/admin/products` | Gestión de productos |
| `/admin/orders` | Gestión de órdenes |
| `/admin/categories` | Gestión de categorías |
| `/admin/settings` | Configuración del sistema |

## 🔒 Seguridad

### Middleware de Administración

El panel está protegido por el middleware `AdminMiddleware` que:

1. Verifica que el usuario esté autenticado
2. Puede verificar permisos adicionales (descomenta las líneas en el middleware)

### Personalización del Middleware

Para agregar verificación de roles de administrador, edita `app/Http/Middleware/AdminMiddleware.php`:

```php
public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // Verificar si el usuario es administrador
    if (!auth()->user()->is_admin) {
        abort(403, 'No tienes permisos para acceder a esta área');
    }

    return $next($request);
}
```

## 🎨 Personalización

### Colores y Tema

El panel usa la paleta de colores de Tailwind CSS. Los colores principales son:

- **Primario**: Indigo (azul)
- **Secundario**: Gray (gris)
- **Éxito**: Green (verde)
- **Advertencia**: Yellow (amarillo)
- **Error**: Red (rojo)

### Agregar Nuevas Secciones

1. Agrega la ruta en `routes/web.php`:

```php
Route::get('/nueva-seccion', [AdminController::class, 'nuevaSeccion'])->name('nueva-seccion');
```

2. Crea el método en `AdminController.php`:

```php
public function nuevaSeccion()
{
    return view('admin.nueva-seccion');
}
```

3. Crea la vista en `resources/views/admin/nueva-seccion.blade.php`:

```php
@extends('layouts.app')

@section('title', 'Nueva Sección')
@section('page-title', 'Nueva Sección')

@section('content')
    <!-- Tu contenido aquí -->
@endsection
```

4. Agrega el enlace en el sidebar de `resources/views/admin/layouts/app.blade.php`

### Agregar Nuevas Métricas al Dashboard

Edita `resources/views/admin/dashboard.blade.php` para agregar nuevas tarjetas de estadísticas.

## 📱 Responsive Design

El panel está completamente optimizado para dispositivos móviles:

- **Sidebar colapsible** en móviles
- **Tablas responsive** con scroll horizontal
- **Botones y formularios** adaptativos
- **Grid system** que se ajusta al tamaño de pantalla

## 🔧 Desarrollo

### Agregar JavaScript

El layout incluye Alpine.js para interactividad. Puedes agregar más JavaScript en las vistas específicas.

### Agregar CSS Personalizado

Puedes agregar estilos personalizados en `resources/css/app.css` o crear clases específicas en las vistas.

## 📊 Funcionalidades Futuras

Algunas ideas para expandir el panel:

- [ ] Gráficos interactivos con Chart.js
- [ ] Exportación de datos a Excel/PDF
- [ ] Notificaciones en tiempo real
- [ ] Sistema de logs de actividad
- [ ] Backup automático de la base de datos
- [ ] Gestión de archivos y medios
- [ ] Sistema de comentarios y revisiones

## 🐛 Solución de Problemas

### Error 403 - No tienes permisos

Verifica que el middleware esté configurado correctamente y que el usuario tenga los permisos necesarios.

### Estilos no se cargan

Ejecuta `npm run build` para compilar los estilos de Tailwind CSS.

### Rutas no funcionan

Verifica que las rutas estén registradas correctamente en `routes/web.php` y que el middleware esté aplicado.

## 📞 Soporte

Si tienes problemas o preguntas sobre el panel de administración, revisa la documentación de Laravel y Tailwind CSS, o consulta los archivos de ejemplo incluidos en el proyecto.

---

¡Disfruta usando tu nuevo panel de administración! 🎉
