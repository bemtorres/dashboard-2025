# Sistema de Toast/Alertas

Sistema moderno de notificaciones para la aplicación Laravel.

## Archivos

- `toast.js` - Sistema principal de toast

## Uso

### Importar en tu layout

```html
<script src="{{ asset('common/toast.js') }}"></script>
```

### Métodos principales

```javascript
// Métodos básicos
toast.success('Operación exitosa')
toast.error('Error al procesar')
toast.warning('Advertencia importante')
toast.info('Información')

// Con duración personalizada
toast.success('Mensaje', 3000) // 3 segundos

// Con opciones adicionales
toast.success('Mensaje', 5000, {
    title: 'Título personalizado'
})

// Método personalizado
toast.custom('mi-tipo', 'Mensaje personalizado')

// Compatibilidad con alert() anterior
alert('success', 'Mensaje')
alert('error', 'Mensaje', 2000)
```

### Métodos de conveniencia globales

```javascript
// Funciones globales rápidas
toastSuccess('Mensaje')
toastError('Mensaje')
toastWarning('Mensaje')
toastInfo('Mensaje')
```

### Gestión de toasts

```javascript
// Limpiar todos los toasts
toast.clear()

// Remover toast específico
toast.remove(toastId)

// Obtener ID del toast para controlarlo
const id = toast.success('Mensaje')
```

## Características

- ✅ **4 tipos**: success, error, warning, info
- ✅ **Auto-cierre**: 5 segundos por defecto
- ✅ **Botón cerrar**: X en cada toast
- ✅ **Barra de progreso**: Muestra tiempo restante
- ✅ **Apilamiento**: Máximo 5 toasts simultáneos
- ✅ **Animaciones**: Entrada y salida suaves
- ✅ **Responsive**: Se adapta al tamaño de pantalla
- ✅ **Hover pause**: Pausa el progreso al pasar el mouse
- ✅ **Backdrop blur**: Efecto de desenfoque moderno

## Personalización

### Configuración por defecto

```javascript
const toast = new ToastManager({
    defaultDuration: 5000,    // Duración por defecto
    maxToasts: 5,             // Máximo de toasts
    position: 'top-right'     // Posición en pantalla
});
```

### Tipos personalizados

Para agregar nuevos tipos, modifica el método `getToastConfig()` en `toast.js`:

```javascript
const configs = {
    // ... tipos existentes
    custom: {
        bg: '#8b5cf6',
        icon: 'M...',
        iconColor: 'white',
        title: 'Personalizado'
    }
};
```

## Ejemplos de uso

### En formularios

```javascript
// Al enviar formulario
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    try {
        await submitForm();
        toast.success('Formulario enviado correctamente');
    } catch (error) {
        toast.error('Error al enviar el formulario');
    }
});
```

### En AJAX

```javascript
fetch('/api/data')
    .then(response => response.json())
    .then(data => {
        toast.success('Datos cargados correctamente');
    })
    .catch(error => {
        toast.error('Error al cargar los datos');
    });
```

### Con validaciones

```javascript
if (!email) {
    toast.warning('Por favor ingresa un email válido');
    return;
}

if (password.length < 8) {
    toast.error('La contraseña debe tener al menos 8 caracteres');
    return;
}

toast.success('Validación exitosa');
```

## Compatibilidad

- ✅ Chrome 60+
- ✅ Firefox 55+
- ✅ Safari 12+
- ✅ Edge 79+
- ✅ Mobile browsers

## Notas

- El sistema es completamente independiente
- No requiere dependencias externas
- Compatible con temas claro/oscuro
- Optimizado para rendimiento
