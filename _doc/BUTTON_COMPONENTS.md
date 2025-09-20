# Componentes de Botón

Este proyecto incluye componentes de botón reutilizables para mantener consistencia en toda la aplicación.

## Componente Principal: `<x-button>`

### Uso Básico

```blade
<x-button>Texto del botón</x-button>
```

### Variantes Disponibles

```blade
<!-- Botón primario (por defecto) -->
<x-button variant="primary">Primario</x-button>

<!-- Botón secundario -->
<x-button variant="secondary">Secundario</x-button>

<!-- Botón de éxito -->
<x-button variant="success">Éxito</x-button>

<!-- Botón de error -->
<x-button variant="error">Error</x-button>

<!-- Botón de advertencia -->
<x-button variant="warning">Advertencia</x-button>

<!-- Botón con borde -->
<x-button variant="outline">Con borde</x-button>

<!-- Botón fantasma -->
<x-button variant="ghost">Fantasma</x-button>

<!-- Botón de enlace -->
<x-button variant="link">Enlace</x-button>
```

### Tamaños Disponibles

```blade
<!-- Extra pequeño -->
<x-button size="xs">XS</x-button>

<!-- Pequeño -->
<x-button size="sm">SM</x-button>

<!-- Mediano (por defecto) -->
<x-button size="md">MD</x-button>

<!-- Grande -->
<x-button size="lg">LG</x-button>

<!-- Extra grande -->
<x-button size="xl">XL</x-button>
```

### Botones con Iconos

```blade
<!-- Icono a la izquierda (por defecto) -->
<x-button 
    icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path>"
>
    Agregar
</x-button>

<!-- Icono a la derecha -->
<x-button 
    icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7'></path>"
    iconPosition="right"
>
    Siguiente
</x-button>
```

### Botones como Enlaces

```blade
<!-- Enlace interno -->
<x-button href="{{ route('admin.users.create') }}">
    Crear Usuario
</x-button>

<!-- Enlace externo -->
<x-button href="https://example.com" target="_blank">
    Sitio Web
</x-button>
```

### Estados Especiales

```blade
<!-- Botón deshabilitado -->
<x-button disabled>Deshabilitado</x-button>

<!-- Botón con estado de carga -->
<x-button loading>Cargando...</x-button>

<!-- Botón con clases personalizadas -->
<x-button class="w-full bg-red-500">
    Personalizado
</x-button>
```

### Tipos de Botón

```blade
<!-- Botón de envío -->
<x-button type="submit">Enviar</x-button>

<!-- Botón de reset -->
<x-button type="reset">Limpiar</x-button>

<!-- Botón normal (por defecto) -->
<x-button type="button">Normal</x-button>
```

## Componente Específico: `<x-theme-toggle>`

### Uso Básico

```blade
<x-theme-toggle />
```

### Con Tamaño Personalizado

```blade
<x-theme-toggle size="sm" />
<x-theme-toggle size="md" />
<x-theme-toggle size="lg" />
```

### Con Clases Personalizadas

```blade
<x-theme-toggle class="ml-4" />
```

## Ejemplos de Uso en Formularios

```blade
<form>
    <div class="flex space-x-2">
        <x-button type="submit" variant="primary">
            Guardar
        </x-button>
        <x-button type="button" variant="outline">
            Cancelar
        </x-button>
    </div>
</form>
```

## Ejemplos de Uso en Tablas

```blade
<div class="flex space-x-2">
    <x-button 
        href="{{ route('admin.users.show', $user) }}" 
        variant="ghost" 
        size="sm"
        icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'></path>"
    >
        Ver
    </x-button>
    <x-button 
        href="{{ route('admin.users.edit', $user) }}" 
        variant="outline" 
        size="sm"
        icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path>"
    >
        Editar
    </x-button>
    <x-button 
        variant="error" 
        size="sm"
        icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>"
        onclick="confirm('¿Eliminar?')"
    >
        Eliminar
    </x-button>
</div>
```

## Personalización

### Colores Personalizados

Los componentes utilizan las variables CSS definidas en `theme.css`:

- `--primary-600`, `--primary-700`, etc.
- `--secondary-600`, `--secondary-700`, etc.
- `--success-600`, `--success-700`, etc.
- `--error-600`, `--error-700`, etc.
- `--warning-600`, `--warning-700`, etc.

### Clases CSS Personalizadas

Puedes agregar clases personalizadas usando el atributo `class`:

```blade
<x-button class="w-full bg-gradient-to-r from-blue-500 to-purple-600">
    Botón Personalizado
</x-button>
```

## Modo Dark

El componente de botón está completamente adaptado para el modo dark y utiliza las variables CSS del sistema de temas:

### **Adaptación Automática**
- **Colores dinámicos**: Usa variables CSS que cambian automáticamente
- **Contraste optimizado**: Colores que funcionan bien en ambos modos
- **Transiciones suaves**: Cambios de color fluidos al cambiar de tema

### **Variantes en Modo Dark**
```blade
<!-- Botón primario - Verde OpenAI -->
<x-button variant="primary">Primario</x-button>

<!-- Botón secundario - Gris neutro -->
<x-button variant="secondary">Secundario</x-button>

<!-- Botón outline - Borde verde, fondo transparente -->
<x-button variant="outline">Con borde</x-button>

<!-- Botón ghost - Solo texto verde -->
<x-button variant="ghost">Fantasma</x-button>
```

### **Colores por Variante**
- **Primary**: Verde OpenAI (`--primary-500`) que funciona en ambos modos
- **Secondary**: Gris neutro (`--secondary-500`) adaptado al tema
- **Success**: Verde de éxito (`--success-500`) consistente
- **Error**: Rojo de error (`--error-500`) visible en ambos modos
- **Warning**: Naranja de advertencia (`--warning-500`) contrastante

## Ventajas

1. **Consistencia**: Todos los botones siguen el mismo patrón de diseño
2. **Mantenibilidad**: Cambios en un lugar se aplican a toda la aplicación
3. **Reutilización**: Fácil de usar en cualquier vista
4. **Flexibilidad**: Múltiples variantes y opciones de personalización
5. **Accesibilidad**: Incluye atributos ARIA y semántica correcta
6. **Responsive**: Se adapta a diferentes tamaños de pantalla
7. **Modo Dark**: Adaptación automática a temas claro y oscuro
8. **Colores OpenAI**: Paleta inspirada en el diseño de OpenAI
