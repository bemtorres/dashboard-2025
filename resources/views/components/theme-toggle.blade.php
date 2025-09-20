@props([
    'size' => 'sm',
    'class' => ''
])

@php
    // Tamaños de botón
    $sizes = [
        'xs' => 'w-6 h-6',
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-12 h-12'
    ];

    // Clases base
    $baseClasses = 'relative inline-flex items-center justify-center rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 group';

    // Clases de tamaño
    $sizeClasses = $sizes[$size] ?? $sizes['sm'];

    // Clases finales
    $classes = $baseClasses . ' ' . $sizeClasses . ' ' . $class;
@endphp

<button
    type="button"
    id="theme-toggle"
    onclick="toggleTheme()"
    style="background-color: var(--primary-500);"
    onmouseover="this.style.backgroundColor='var(--primary-600)'"
    onmouseout="this.style.backgroundColor='var(--primary-500)'"
    title="Cambiar tema"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <span class="sr-only">Cambiar tema</span>
    <!-- Icono de sol (modo claro) -->
    <svg
        class="w-4 h-4 group-hover:scale-105 transition-transform duration-200 theme-icon-light"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        style="display: block;"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 3v1m0 16v1m9-9h1M3 12H2m15.325-4.325l.707-.707M3.968 3.968l-.707-.707m0 16.064l.707-.707m16.064 0l.707-.707M12 7a5 5 0 100 10 5 5 0 000-10z"
        ></path>
    </svg>
    <!-- Icono de luna (modo oscuro) -->
    <svg
        class="w-4 h-4 group-hover:scale-105 transition-transform duration-200 theme-icon-dark"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        style="display: none;"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
        ></path>
    </svg>
</button>

<script>
// Script del componente theme-toggle - Autónomo
console.log('🎨 Componente theme-toggle cargado');

// Función para actualizar iconos de este componente específico
function updateThemeToggleIcons() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const lightIcon = document.querySelector('#theme-toggle .theme-icon-light');
    const darkIcon = document.querySelector('#theme-toggle .theme-icon-dark');
    const button = document.querySelector('#theme-toggle');

    console.log('🔍 Buscando iconos...', { lightIcon, darkIcon, currentTheme });

    if (lightIcon && darkIcon && button) {
        if (currentTheme === 'dark') {
            lightIcon.style.display = 'none';
            darkIcon.style.display = 'block';
            button.title = 'Cambiar a modo claro';
            console.log('🌙 Mostrando icono de luna - Título: Cambiar a modo claro');
        } else {
            lightIcon.style.display = 'block';
            darkIcon.style.display = 'none';
            button.title = 'Cambiar a modo oscuro';
            console.log('☀️ Mostrando icono de sol - Título: Cambiar a modo oscuro');
        }
        console.log('✅ Iconos del botón actualizados correctamente');
    } else {
        console.log('❌ Elementos no encontrados:', { lightIcon, darkIcon, button });
    }
}

// Función para inicializar cuando el componente esté listo
function initThemeToggle() {
    console.log('🚀 Inicializando theme-toggle...');

    // Actualizar iconos inmediatamente
    updateThemeToggleIcons();

    // Observar cambios en el tema
    const themeObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                console.log('🔄 Tema cambiado, actualizando iconos del botón');
                updateThemeToggleIcons();
            }
        });
    });

    // Iniciar observación
    themeObserver.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-theme']
    });

    console.log('✅ Theme-toggle observador iniciado');
}

// Inicializar cuando el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initThemeToggle);
} else {
    // DOM ya está listo
    initThemeToggle();
}

console.log('✅ Theme-toggle script cargado');
</script>
