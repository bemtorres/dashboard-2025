# Sistema de Modales y Componentes Reutilizables

Este documento describe el sistema de modales y componentes de formulario reutilizables implementado en el proyecto.

## Componentes Disponibles

### 1. Modal (`components/modal.blade.php`)

Componente modal base reutilizable con soporte para temas claro/oscuro.

#### Uso Básico

```blade
<x-modal id="miModal" title="Título del Modal" description="Descripción opcional">
    <!-- Contenido del modal -->
</x-modal>
```

#### Parámetros

| Parámetro | Tipo | Default | Descripción |
|-----------|------|---------|-------------|
| `id` | string | 'modal' | ID único del modal |
| `title` | string | 'Título del Modal' | Título del modal |
| `description` | string | '' | Descripción opcional |
| `size` | string | 'md' | Tamaño: sm, md, lg, xl, 2xl, 4xl |
| `showCloseButton` | boolean | true | Mostrar botón de cerrar |
| `closeOnBackdrop` | boolean | true | Cerrar al hacer clic fuera |
| `closeOnEscape` | boolean | true | Cerrar con tecla Escape |
| `footer` | string | null | Contenido del footer |

#### Ejemplo Completo

```blade
<x-modal 
    id="createUserModal" 
    title="Crear Usuario" 
    description="Completa los datos para crear el nuevo usuario"
    size="4xl"
>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <!-- Contenido del formulario -->
    </form>
    
    <x-slot name="footer">
        <div class="flex justify-end space-x-3">
            <x-button variant="secondary" onclick="closeModal('createUserModal')">
                Cancelar
            </x-button>
            <x-button type="submit" variant="primary">
                Crear Usuario
            </x-button>
        </div>
    </x-slot>
</x-modal>
```

#### Funciones JavaScript

```javascript
// Abrir modal
openModal('miModal');

// Cerrar modal
closeModal('miModal');
```

### 2. Input (`components/input.blade.php`)

Componente de input reutilizable con estilos consistentes.

#### Uso Básico

```blade
<x-input 
    name="email" 
    label="Email" 
    type="email" 
    placeholder="email@ejemplo.com"
    required 
/>
```

#### Parámetros

| Parámetro | Tipo | Default | Descripción |
|-----------|------|---------|-------------|
| `type` | string | 'text' | Tipo de input |
| `name` | string | '' | Nombre del campo |
| `id` | string | '' | ID del campo (usa name si no se especifica) |
| `label` | string | '' | Etiqueta del campo |
| `placeholder` | string | '' | Texto placeholder |
| `value` | string | '' | Valor inicial |
| `required` | boolean | false | Campo requerido |
| `disabled` | boolean | false | Campo deshabilitado |
| `readonly` | boolean | false | Campo solo lectura |
| `error` | string | '' | Mensaje de error personalizado |
| `help` | string | '' | Texto de ayuda |
| `icon` | string | null | Icono SVG |
| `iconPosition` | string | 'right' | Posición del icono: left, right |

#### Ejemplos

```blade
<!-- Input básico -->
<x-input name="name" label="Nombre" required />

<!-- Input con icono -->
<x-input 
    name="email" 
    label="Email" 
    type="email"
    icon='<svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>'
    iconPosition="left"
/>

<!-- Input con error -->
<x-input 
    name="password" 
    label="Contraseña" 
    type="password"
    error="La contraseña debe tener al menos 8 caracteres"
/>

<!-- Input con ayuda -->
<x-input 
    name="phone" 
    label="Teléfono" 
    type="tel"
    help="Formato: +34 123 456 789"
/>
```

### 3. Textarea (`components/textarea.blade.php`)

Componente de textarea reutilizable.

#### Uso Básico

```blade
<x-textarea 
    name="description" 
    label="Descripción" 
    placeholder="Escribe una descripción..."
    rows="4"
/>
```

#### Parámetros

| Parámetro | Tipo | Default | Descripción |
|-----------|------|---------|-------------|
| `name` | string | '' | Nombre del campo |
| `id` | string | '' | ID del campo |
| `label` | string | '' | Etiqueta del campo |
| `placeholder` | string | '' | Texto placeholder |
| `value` | string | '' | Valor inicial |
| `required` | boolean | false | Campo requerido |
| `disabled` | boolean | false | Campo deshabilitado |
| `readonly` | boolean | false | Campo solo lectura |
| `rows` | integer | 3 | Número de filas |
| `resize` | boolean | true | Permitir redimensionar |
| `error` | string | '' | Mensaje de error |
| `help` | string | '' | Texto de ayuda |

### 4. Select (`components/select.blade.php`)

Componente de select reutilizable.

#### Uso Básico

```blade
<x-select 
    name="role" 
    label="Rol" 
    :options="['admin' => 'Administrador', 'user' => 'Usuario']"
    placeholder="Selecciona un rol"
/>
```

#### Parámetros

| Parámetro | Tipo | Default | Descripción |
|-----------|------|---------|-------------|
| `name` | string | '' | Nombre del campo |
| `id` | string | '' | ID del campo |
| `label` | string | '' | Etiqueta del campo |
| `options` | array | [] | Array de opciones |
| `value` | string | '' | Valor seleccionado |
| `placeholder` | string | 'Selecciona una opción' | Texto placeholder |
| `required` | boolean | false | Campo requerido |
| `disabled` | boolean | false | Campo deshabilitado |
| `error` | string | '' | Mensaje de error |
| `help` | string | '' | Texto de ayuda |
| `icon` | string | null | Icono personalizado |

### 5. Button (`components/button.blade.php`)

Componente de botón reutilizable.

#### Uso Básico

```blade
<x-button variant="primary" size="md">
    Texto del botón
</x-button>
```

#### Parámetros

| Parámetro | Tipo | Default | Descripción |
|-----------|------|---------|-------------|
| `type` | string | 'button' | Tipo de botón |
| `variant` | string | 'primary' | Variante: primary, secondary, danger, success, warning, info, ghost |
| `size` | string | 'md' | Tamaño: sm, md, lg |
| `disabled` | boolean | false | Botón deshabilitado |
| `loading` | boolean | false | Mostrar estado de carga |
| `icon` | string | null | Icono SVG |
| `iconPosition` | string | 'left' | Posición del icono: left, right |
| `href` | string | null | Enlace (convierte en <a>) |
| `target` | string | null | Target del enlace |

#### Ejemplos

```blade
<!-- Botón primario -->
<x-button variant="primary">
    Guardar
</x-button>

<!-- Botón con icono -->
<x-button variant="success" icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>'>
    Confirmar
</x-button>

<!-- Botón de enlace -->
<x-button href="/dashboard" variant="ghost">
    Ir al Dashboard
</x-button>

<!-- Botón con estado de carga -->
<x-button variant="primary" loading>
    Procesando...
</x-button>
```

## Ejemplo de Modal Completo

```blade
<x-modal 
    id="createUserModal" 
    title="Crear Usuario" 
    description="Completa los datos para crear el nuevo usuario"
    size="4xl"
>
    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Nombre y Apellido -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input 
                name="name" 
                label="Nombre" 
                placeholder="Nombre del usuario"
                required 
            />
            <x-input 
                name="last_name" 
                label="Apellido" 
                placeholder="Apellido del usuario"
            />
        </div>
        
        <!-- Email -->
        <x-input 
            name="email" 
            label="Email" 
            type="email"
            placeholder="email@ejemplo.com"
            required 
        />
        
        <!-- Contraseña y Rol -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input 
                name="password" 
                label="Contraseña" 
                type="password"
                placeholder="Contraseña"
                help="Mínimo 8 caracteres"
                required 
            />
            <x-select 
                name="is_admin" 
                label="Rol del usuario"
                :options="['0' => 'Usuario', '1' => 'Administrador']"
            />
        </div>
        
        <!-- Foto -->
        <x-input 
            name="photo" 
            label="Foto de perfil" 
            type="file"
            help="JPG, PNG, GIF. Máximo 2MB"
        />
        
        <!-- Botones -->
        <div class="flex justify-end space-x-3 pt-4">
            <x-button 
                variant="secondary" 
                onclick="closeModal('createUserModal')"
            >
                Cancelar
            </x-button>
            <x-button 
                type="submit" 
                variant="primary"
                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>'
            >
                Crear Usuario
            </x-button>
        </div>
    </form>
</x-modal>
```

## Características del Sistema

### Tema Dinámico
- Soporte automático para tema claro/oscuro
- Variables CSS que se actualizan dinámicamente
- Transiciones suaves entre temas

### Colores Consistentes
- Focus ring: gris (`focus:ring-gray-400`)
- Focus border: gris (`focus:border-gray-400`)
- Colores de error: rojo
- Colores de éxito: verde
- Paleta de grises para elementos neutros

### Responsive
- Modales adaptables a diferentes tamaños de pantalla
- Grids responsivos en formularios
- Botones que se adaptan al contenido

### Accesibilidad
- Labels asociados correctamente
- Focus management automático
- Soporte para lectores de pantalla
- Navegación por teclado

### Validación
- Integración con Laravel validation
- Mensajes de error automáticos
- Estados visuales de error
- Texto de ayuda opcional

## Migración del Modal Existente

Para migrar el modal existente al nuevo sistema:

1. Reemplazar la estructura HTML del modal con `<x-modal>`
2. Reemplazar los inputs con los componentes `<x-input>`, `<x-textarea>`, `<x-select>`
3. Reemplazar los botones con `<x-button>`
4. Actualizar las funciones JavaScript para usar `openModal()` y `closeModal()`

El sistema mantiene toda la funcionalidad existente pero con un código más limpio y reutilizable.
