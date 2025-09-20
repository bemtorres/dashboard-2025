# Sistema de Temas para Modales

Este sistema permite aplicar automáticamente temas claros y oscuros a todos los modales de formulario de la aplicación.

## Archivos incluidos

- `modal-theme.js` - JavaScript principal que gestiona los temas
- `modal-theme.css` - Estilos CSS complementarios
- `modal-integration-example.js` - Ejemplo de integración y funciones auxiliares

## Instalación

### 1. Incluir los archivos en tu layout principal

```html
<!-- En el <head> -->
<link rel="stylesheet" href="{{ asset('css/modal-theme.css') }}">

<!-- Antes del cierre de </body> -->
<script src="{{ asset('js/modal-theme.js') }}"></script>
<script src="{{ asset('js/modal-integration-example.js') }}"></script>
```

### 2. Actualizar tu modal existente

Reemplaza las clases de Tailwind con las clases del sistema de temas:

```html
<!-- Antes -->
<div id="miModal" class="fixed inset-0 bg-black/30 backdrop-blur-[1px] hidden z-50">
    <div class="bg-white rounded-lg shadow-2xl border border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700">
            <h3 class="text-gray-800 dark:text-white">Título</h3>
            <label class="text-gray-700 dark:text-gray-200">Label</label>
            <input class="bg-white border-gray-300 text-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        </div>
    </div>
</div>

<!-- Después -->
<div id="miModal" class="modal-container">
    <div class="modal-content modal-theme-applied">
        <div class="modal-header modal-theme-applied">
            <h3 class="modal-title modal-theme-applied">Título</h3>
            <label class="modal-label modal-theme-applied">Label</label>
            <input class="modal-input modal-theme-applied">
        </div>
    </div>
</div>
```

## Uso

### Aplicación automática

El sistema detecta automáticamente el modo oscuro y aplica los estilos correspondientes:

```javascript
// Se ejecuta automáticamente al cargar la página
// Detecta cambios en el tema y actualiza todos los modales
```

### Aplicación manual

```javascript
// Aplicar tema a un modal específico
window.applyModalTheme('miModal');

// Refrescar todos los modales
window.refreshModalThemes();

// Crear un nuevo modal con tema
const modalId = window.createThemedModal('nuevoModal', 'Título', 'Contenido HTML');
```

### Funciones disponibles

```javascript
// Abrir modal
window.showModal('miModal');

// Cerrar modal
window.closeModal('miModal');

// Crear modal con tema
window.createThemedModal('id', 'título', 'contenido');
```

## Clases CSS disponibles

### Contenedores
- `.modal-container` - Contenedor principal del modal
- `.modal-content` - Contenido del modal
- `.modal-header` - Header del modal
- `.modal-theme-applied` - Aplica transiciones suaves

### Elementos de formulario
- `.modal-title` - Títulos
- `.modal-subtitle` - Subtítulos
- `.modal-label` - Labels de formulario
- `.modal-input` - Inputs, selects, textareas
- `.modal-file-input` - Inputs de archivo
- `.modal-button-cancel` - Botón cancelar
- `.modal-button-primary` - Botón primario

## Detección de tema

El sistema detecta el modo oscuro de las siguientes formas:

1. **Clase 'dark' en el body**: `<body class="dark">`
2. **Preferencia del sistema**: `prefers-color-scheme: dark`
3. **Cambios dinámicos**: Observa cambios en tiempo real

## Personalización

### Modificar colores

Edita las variables en `modal-theme.js`:

```javascript
const lightTheme = {
    modal: {
        background: 'bg-gray-50',  // Cambiar color de fondo
        border: 'border-gray-100', // Cambiar color de borde
    },
    // ... más configuraciones
};
```

### Agregar nuevos elementos

```javascript
// En la función updateModalClasses, agregar:
const newElement = modal.querySelector('.mi-elemento');
if (newElement) {
    newElement.classList.add(theme.miElemento.color);
}
```

## Compatibilidad

- ✅ Tailwind CSS
- ✅ Modo claro y oscuro
- ✅ Transiciones suaves
- ✅ Detección automática de tema
- ✅ Todos los navegadores modernos

## Ejemplo completo

```html
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/modal-theme.css">
</head>
<body>
    <button onclick="openCreateUserModal()">Abrir Modal</button>
    
    <div id="createUserModal" class="modal-container">
        <div class="modal-content modal-theme-applied">
            <div class="modal-header modal-theme-applied">
                <h3 class="modal-title modal-theme-applied">Crear Usuario</h3>
            </div>
            <form>
                <label class="modal-label modal-theme-applied">Nombre</label>
                <input class="modal-input modal-theme-applied" type="text">
                <button class="modal-button-primary modal-theme-applied">Guardar</button>
            </form>
        </div>
    </div>
    
    <script src="js/modal-theme.js"></script>
    <script src="js/modal-integration-example.js"></script>
</body>
</html>
```

## Notas importantes

1. **Orden de carga**: Cargar `modal-theme.js` antes que `modal-integration-example.js`
2. **Clases requeridas**: Siempre incluir `modal-theme-applied` para transiciones
3. **Detección automática**: El sistema funciona automáticamente, no requiere configuración adicional
4. **Compatibilidad**: Funciona con cualquier framework CSS que use clases de utilidad
