{{-- Componente Modal Reutilizable --}}
@props([
    'id' => 'modal',
    'title' => 'Título del Modal',
    'description' => '',
    'size' => 'md', // sm, md, lg, xl, 2xl, 4xl
    'showCloseButton' => true,
    'closeOnBackdrop' => true,
    'closeOnEscape' => true,
    'footer' => null
])

@php
    $sizeClasses = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '4xl' => 'max-w-4xl'
    ];
@endphp

<style>
/* Variables CSS para tema dinámico del modal */
#{{ $id }} {
    --modal-bg: #ffffff;
    --modal-border: #e5e7eb;
    --text-primary: #111827;
    --text-secondary: #6b7280;
    --input-bg: #ffffff;
    --input-border: #d1d5db;
    --input-text: #111827;
    --input-placeholder: #6b7280;
    --button-bg: #ffffff;
    --button-text: #374151;
    --button-border: #d1d5db;
    --focus-ring: #9ca3af;
    --focus-border: #9ca3af;
    transition: all 0.3s ease;
}

#{{ $id }}.dark-theme-active {
    background-color: rgba(0, 0, 0, 0.6) !important;
}

#{{ $id }}.light-theme-active {
    background-color: rgba(0, 0, 0, 0.3) !important;
}

/* Aplicar variables CSS a los elementos del modal */
#{{ $id }} .bg-white {
    background-color: var(--modal-bg) !important;
}

#{{ $id }} .border-gray-200 {
    border-color: var(--modal-border) !important;
}

#{{ $id }} .dark\\:border-gray-700 {
    border-color: var(--modal-border) !important;
}

#{{ $id }} .dark\\:border-gray-600 {
    border-color: var(--modal-border) !important;
}

#{{ $id }} .text-gray-800 {
    color: var(--text-primary) !important;
}

#{{ $id }} .text-gray-600 {
    color: var(--text-secondary) !important;
}

#{{ $id }} .text-gray-700 {
    color: var(--text-primary) !important;
}

#{{ $id }} .dark\\:text-gray-200 {
    color: var(--text-primary) !important;
}

#{{ $id }} label {
    color: var(--text-primary) !important;
}

#{{ $id }} .dark\\:bg-gray-800 {
    background-color: var(--input-bg) !important;
}

#{{ $id }} .dark\\:border-gray-600 {
    border-color: var(--input-border) !important;
}

/* Estilos específicos para inputs */
#{{ $id }} input[type="text"],
#{{ $id }} input[type="email"],
#{{ $id }} input[type="password"],
#{{ $id }} input[type="number"],
#{{ $id }} input[type="tel"],
#{{ $id }} input[type="url"],
#{{ $id }} input[type="date"],
#{{ $id }} input[type="datetime-local"],
#{{ $id }} input[type="time"],
#{{ $id }} input[type="file"],
#{{ $id }} textarea,
#{{ $id }} select {
    color: var(--input-text) !important;
    background-color: var(--input-bg) !important;
    border-color: var(--input-border) !important;
}

#{{ $id }} input::placeholder,
#{{ $id }} textarea::placeholder {
    color: var(--input-placeholder) !important;
}

#{{ $id }} input:focus,
#{{ $id }} textarea:focus,
#{{ $id }} select:focus {
    color: var(--input-text) !important;
    background-color: var(--input-bg) !important;
    border-color: var(--focus-border) !important;
    box-shadow: 0 0 0 2px rgba(156, 163, 175, 0.2) !important;
}

/* Estilos específicos para botones */
#{{ $id }} button {
    background-color: var(--button-bg) !important;
    color: var(--button-text) !important;
    border-color: var(--button-border) !important;
}

#{{ $id }} button:hover {
    background-color: var(--button-bg) !important;
    color: var(--button-text) !important;
    opacity: 0.9;
}

/* Estilos específicos para bordes del header */
#{{ $id }} .border-b {
    border-bottom-color: var(--modal-border) !important;
}

/* Eliminar bordes en modo oscuro */
#{{ $id }}.dark-theme-active {
    border: none !important;
}

#{{ $id }}.dark-theme-active .border,
#{{ $id }}.dark-theme-active .border-b,
#{{ $id }}.dark-theme-active .border-gray-200,
#{{ $id }}.dark-theme-active .dark\\:border-gray-700,
#{{ $id }}.dark-theme-active .dark\\:border-gray-600 {
    border-color: transparent !important;
}
</style>

<div id="{{ $id }}" class="fixed inset-0 bg-black/30 backdrop-blur-[1px] hidden z-50 items-center justify-center p-2">
    <div class="bg-white rounded-lg shadow-2xl {{ $sizeClasses[$size] }} w-full max-h-[95vh] overflow-y-auto border border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <!-- Header del modal -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 dark:border-gray-600">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center dark:text-white">
                    {{ $title }}
                </h3>
                @if($description)
                    <p class="text-sm text-gray-600 mt-1 dark:text-gray-300">{{ $description }}</p>
                @endif
            </div>
            @if($showCloseButton)
                <button type="button" onclick="closeModal('{{ $id }}')" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            @endif
        </div>

        <!-- Contenido del modal -->
        <div class="p-4">
            {{ $slot }}
        </div>

        <!-- Footer del modal -->
        @if($footer)
            <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-600">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>

<script>
// Funciones globales para el sistema de modales
function isDarkMode() {
    return document.documentElement.classList.contains('dark') ||
           localStorage.getItem('theme') === 'dark' ||
           (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
}

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        applyThemeToModal(modalId);

        // Enfocar el primer input del modal
        setTimeout(() => {
            const firstInput = modal.querySelector('input, textarea, select');
            if (firstInput) {
                firstInput.focus();
            }
        }, 100);
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';

        // Limpiar formularios
        const form = modal.querySelector('form');
        if (form) {
            form.reset();
        }
    }
}

function applyThemeToModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    const isDark = isDarkMode();

    if (isDark) {
        modal.classList.add('dark-theme-active');
        modal.classList.remove('light-theme-active');

        modal.style.setProperty('--modal-bg', '#303030');
        modal.style.setProperty('--modal-border', 'transparent');
        modal.style.setProperty('--text-primary', '#dcdcdc');
        modal.style.setProperty('--text-secondary', '#dcdcdc');
        modal.style.setProperty('--input-bg', '#303030');
        modal.style.setProperty('--input-border', '#dcdcdc');
        modal.style.setProperty('--input-text', '#dcdcdc');
        modal.style.setProperty('--input-placeholder', '#a0a0a0');
        modal.style.setProperty('--button-bg', '#ededed');
        modal.style.setProperty('--button-text', '#000000');
        modal.style.setProperty('--button-border', '#dcdcdc');
        modal.style.setProperty('--focus-ring', '#dcdcdc');
        modal.style.setProperty('--focus-border', '#dcdcdc');
    } else {
        modal.classList.add('light-theme-active');
        modal.classList.remove('dark-theme-active');

        modal.style.setProperty('--modal-bg', '#ffffff');
        modal.style.setProperty('--modal-border', '#e5e7eb');
        modal.style.setProperty('--text-primary', '#111827');
        modal.style.setProperty('--text-secondary', '#6b7280');
        modal.style.setProperty('--input-bg', '#ffffff');
        modal.style.setProperty('--input-border', '#d1d5db');
        modal.style.setProperty('--input-text', '#111827');
        modal.style.setProperty('--input-placeholder', '#6b7280');
        modal.style.setProperty('--button-bg', '#ffffff');
        modal.style.setProperty('--button-text', '#374151');
        modal.style.setProperty('--button-border', '#d1d5db');
        modal.style.setProperty('--focus-ring', '#9ca3af');
        modal.style.setProperty('--focus-border', '#9ca3af');
    }
}

// Cerrar modal al hacer clic fuera
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
        const modalId = e.target.id;
        if (modalId) {
            closeModal(modalId);
        }
    }
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const openModals = document.querySelectorAll('.fixed.inset-0:not(.hidden)');
        openModals.forEach(modal => {
            closeModal(modal.id);
        });
    }
});

// Escuchar cambios en el tema
function watchThemeChanges() {
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                const openModals = document.querySelectorAll('.fixed.inset-0:not(.hidden)');
                openModals.forEach(modal => {
                    applyThemeToModal(modal.id);
                });
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });

    window.addEventListener('storage', function(e) {
        if (e.key === 'theme') {
            const openModals = document.querySelectorAll('.fixed.inset-0:not(.hidden)');
            openModals.forEach(modal => {
                applyThemeToModal(modal.id);
            });
        }
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
        const openModals = document.querySelectorAll('.fixed.inset-0:not(.hidden)');
        openModals.forEach(modal => {
            applyThemeToModal(modal.id);
        });
    });
}

// Inicializar el observador de temas
document.addEventListener('DOMContentLoaded', function() {
    watchThemeChanges();
});
</script>
