# Sistema de Temas y Colores

## 🎨 Sistema de Colores Base

### Colores Primarios
- **Primary 50-900**: Escala de azul para elementos principales
- **Secondary 50-900**: Escala de verde para elementos secundarios
- **Success 50-700**: Verde para estados de éxito
- **Error 50-700**: Rojo para estados de error
- **Warning 50-700**: Amarillo para advertencias

### Colores Neutros
- **Neutral 50-900**: Escala de grises que se adapta al tema
- **Modo Claro**: Grises claros para fondo, oscuros para texto
- **Modo Oscuro**: Grises oscuros para fondo, claros para texto

## 🌙 Modo Dark/Light

### Características
- **Toggle automático**: Botón flotante en la esquina superior derecha
- **Persistencia**: Guarda la preferencia en localStorage
- **Detección del sistema**: Respeta la preferencia del SO
- **Transiciones suaves**: Cambios animados entre temas

### Variables CSS
```css
/* Modo Claro */
:root {
  --bg-primary: #ffffff;
  --bg-secondary: #f9fafb;
  --text-primary: #111827;
  --text-secondary: #6b7280;
}

/* Modo Oscuro */
[data-theme="dark"] {
  --bg-primary: #0f172a;
  --bg-secondary: #1e293b;
  --text-primary: #f8fafc;
  --text-secondary: #cbd5e1;
}
```

## 🎯 Clases de Utilidad

### Botones del Sistema
```html
<!-- Botón Primario -->
<button class="btn-primary">Acción Principal</button>

<!-- Botón Secundario -->
<button class="btn-secondary">Acción Secundaria</button>

<!-- Botón de Éxito -->
<button class="btn-success">Confirmar</button>

<!-- Botón de Error -->
<button class="btn-error">Eliminar</button>

<!-- Botón de Advertencia -->
<button class="btn-warning">Advertencia</button>
```

### Colores de Fondo
```html
<div class="bg-primary">Fondo Principal</div>
<div class="bg-secondary">Fondo Secundario</div>
<div class="bg-tertiary">Fondo Terciario</div>
```

### Colores de Texto
```html
<h1 class="text-primary">Título Principal</h1>
<p class="text-secondary">Texto Secundario</p>
<span class="text-tertiary">Texto Terciario</span>
```

### Cards y Contenedores
```html
<div class="card">
  <div class="card-header">Encabezado</div>
  <div class="card-body">Contenido</div>
</div>
```

### Sidebar
```html
<div class="sidebar">
  <div class="sidebar-header">Encabezado</div>
  <a class="sidebar-item active">Elemento Activo</a>
  <a class="sidebar-item">Elemento Normal</a>
</div>
```

## 🔧 Uso en JavaScript

### Cambiar Tema Programáticamente
```javascript
// Obtener el gestor de temas
const themeManager = window.themeManager;

// Cambiar a modo oscuro
themeManager.setTheme('dark');

// Cambiar a modo claro
themeManager.setTheme('light');

// Obtener tema actual
const currentTheme = themeManager.getCurrentTheme();
```

### Eventos del Tema
```javascript
// Escuchar cambios de tema
document.addEventListener('themeChanged', (event) => {
  console.log('Tema cambiado a:', event.detail.theme);
});
```

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

### Adaptaciones
- **Sidebar**: Se oculta en móvil, visible en desktop
- **Toggle**: Siempre visible, posición fija
- **Cards**: Se adaptan al ancho disponible

## 🎨 Personalización

### Agregar Nuevos Colores
```css
:root {
  --custom-50: #f0f9ff;
  --custom-500: #0ea5e9;
  --custom-900: #0c4a6e;
}

[data-theme="dark"] {
  --custom-50: #0c4a6e;
  --custom-500: #0ea5e9;
  --custom-900: #f0f9ff;
}
```

### Crear Nueva Clase de Botón
```css
.btn-custom {
  @apply px-4 py-2 rounded-lg font-medium transition-all duration-200;
  background-color: var(--custom-500);
  color: white;
  box-shadow: var(--shadow-sm);
}

.btn-custom:hover {
  background-color: var(--custom-600);
  box-shadow: var(--shadow-md);
  transform: translateY(-1px);
}
```

## 🚀 Mejores Prácticas

### 1. Consistencia
- Usar siempre las clases del sistema
- Mantener la jerarquía de colores
- Aplicar transiciones consistentes

### 2. Accesibilidad
- Contraste adecuado entre texto y fondo
- Indicadores visuales claros
- Navegación por teclado

### 3. Performance
- Variables CSS para cambios rápidos
- Transiciones optimizadas
- Carga asíncrona del JavaScript

### 4. Mantenimiento
- Documentar cambios en colores
- Usar nombres semánticos
- Versionar el sistema de temas

## 🔄 Migración

### De Colores Hardcodeados
```html
<!-- Antes -->
<button class="bg-blue-600 hover:bg-blue-700 text-white">

<!-- Después -->
<button class="btn-primary">
```

### De Clases Tailwind
```html
<!-- Antes -->
<div class="bg-white text-gray-900 border border-gray-200">

<!-- Después -->
<div class="card">
```

## 📊 Métricas

### Rendimiento
- **Tiempo de cambio de tema**: < 100ms
- **Tamaño del CSS**: ~73KB (comprimido)
- **Tamaño del JS**: ~40KB (comprimido)

### Compatibilidad
- **Navegadores**: Chrome 90+, Firefox 88+, Safari 14+
- **Dispositivos**: Desktop, Tablet, Mobile
- **Sistemas**: Windows, macOS, Linux, iOS, Android
