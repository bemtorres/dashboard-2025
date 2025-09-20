# Paleta de Colores Estilo OpenAI

Este proyecto utiliza una paleta de colores inspirada en el diseño de OpenAI para crear una experiencia visual consistente y moderna.

## 🎨 **Colores Principales**

### **Modo Claro**
- **Fondo Primario**: `#ffffff` - Blanco puro para contenido principal
- **Fondo Secundario**: `#f7f7f8` - Gris muy claro para secciones
- **Fondo Terciario**: `#f0f0f0` - Gris claro para elementos de apoyo

### **Modo Oscuro**
- **Fondo Primario**: `#212121` - Gris oscuro para contenido principal
- **Fondo Secundario**: `#2f2f2f` - Gris medio para secciones
- **Fondo Terciario**: `#404040` - Gris más claro para elementos de apoyo

## 📝 **Colores de Texto**

### **Modo Claro**
- **Texto Primario**: `#202123` - Negro suave para títulos y texto principal
- **Texto Secundario**: `#565869` - Gris medio para subtítulos
- **Texto Terciario**: `#8e8ea0` - Gris claro para texto de apoyo

### **Modo Oscuro**
- **Texto Primario**: `#ececf1` - Blanco suave para títulos y texto principal
- **Texto Secundario**: `#c5c5d2` - Gris claro para subtítulos
- **Texto Terciario**: `#8e8ea0` - Gris medio para texto de apoyo

## 🔗 **Colores de Borde**

### **Modo Claro**
- **Borde Primario**: `#e5e5e5` - Gris muy claro para bordes sutiles
- **Borde Secundario**: `#d1d1d1` - Gris claro para bordes más visibles

### **Modo Oscuro**
- **Borde Primario**: `#404040` - Gris medio para bordes sutiles
- **Borde Secundario**: `#565869` - Gris más claro para bordes más visibles

## 🎯 **Colores de Acento**

### **Color Primario (Verde OpenAI)**
- **50**: `#f0f9f0` - Verde muy claro
- **100**: `#dcf2dc` - Verde claro
- **200**: `#bae5ba` - Verde medio claro
- **300**: `#8dd18d` - Verde medio
- **400**: `#5bb85b` - Verde medio oscuro
- **500**: `#10a37f` - Verde principal (color de marca)
- **600**: `#0d8a6b` - Verde oscuro
- **700**: `#0a6b56` - Verde muy oscuro
- **800**: `#085c4a` - Verde casi negro
- **900**: `#064d3e` - Verde negro

### **Colores de Estado**

#### **Éxito**
- **50**: `#f0f9f0` - Verde muy claro
- **100**: `#dcf2dc` - Verde claro
- **500**: `#10a37f` - Verde principal
- **600**: `#0d8a6b` - Verde oscuro
- **700**: `#0a6b56` - Verde muy oscuro

#### **Error**
- **50**: `#fef2f2` - Rojo muy claro
- **100**: `#fee2e2` - Rojo claro
- **500**: `#ff6b6b` - Rojo principal
- **600**: `#ff5252` - Rojo oscuro
- **700**: `#f44336` - Rojo muy oscuro

#### **Advertencia**
- **50**: `#fff8e1` - Naranja muy claro
- **100**: `#ffecb3` - Naranja claro
- **500**: `#ff9800` - Naranja principal
- **600**: `#f57c00` - Naranja oscuro
- **700**: `#ef6c00` - Naranja muy oscuro

## 🌙 **Transición entre Modos**

### **Características de la Transición**
- **Suave**: Transiciones de 300ms para cambios de color
- **Consistente**: Misma paleta base en ambos modos
- **Accesible**: Contraste adecuado en ambos modos
- **Moderno**: Colores neutros y sutiles

### **Elementos que Cambian**
- **Fondos**: De blanco/gris claro a gris oscuro
- **Texto**: De negro/gris a blanco/gris claro
- **Bordes**: De gris claro a gris medio
- **Acentos**: Mantienen la misma intensidad relativa

## 🎨 **Uso en Componentes**

### **Botones**
- **Primario**: Verde OpenAI (`--primary-500`)
- **Secundario**: Gris neutro (`--secondary-500`)
- **Éxito**: Verde de éxito (`--success-500`)
- **Error**: Rojo de error (`--error-500`)

### **Tarjetas y Contenedores**
- **Fondo**: `--bg-primary` para contenido principal
- **Borde**: `--border-primary` para bordes sutiles
- **Sombra**: Adaptada al modo (clara en modo claro, oscura en modo oscuro)

### **Texto**
- **Títulos**: `--text-primary` para máxima legibilidad
- **Subtítulos**: `--text-secondary` para jerarquía visual
- **Texto de apoyo**: `--text-tertiary` para información secundaria

## 🔧 **Implementación Técnica**

### **Variables CSS**
```css
:root {
  --bg-primary: #ffffff;
  --text-primary: #202123;
  --primary-500: #10a37f;
}

[data-theme="dark"] {
  --bg-primary: #212121;
  --text-primary: #ececf1;
  --primary-500: #10a37f;
}
```

### **Clases de Utilidad**
```css
.bg-primary { background-color: var(--bg-primary); }
.text-primary { color: var(--text-primary); }
.border-primary { border-color: var(--border-primary); }
```

## 📱 **Responsive y Accesibilidad**

### **Contraste**
- **Modo Claro**: Contraste mínimo de 4.5:1
- **Modo Oscuro**: Contraste mínimo de 4.5:1
- **Cumple WCAG AA**: Estándares de accesibilidad

### **Compatibilidad**
- **Navegadores**: Soporte completo en navegadores modernos
- **Dispositivos**: Optimizado para móviles y desktop
- **Temas del sistema**: Respeta las preferencias del usuario

## 🎯 **Beneficios del Diseño**

1. **Consistencia**: Paleta unificada en toda la aplicación
2. **Profesional**: Apariencia moderna y limpia
3. **Accesible**: Fácil lectura en ambos modos
4. **Familiar**: Inspirado en interfaces conocidas como OpenAI
5. **Escalable**: Fácil de mantener y extender
