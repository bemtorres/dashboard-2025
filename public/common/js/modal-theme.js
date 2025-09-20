/**
 * Sistema de temas para modales - Versión simplificada
 * Detecta automáticamente el modo oscuro y aplica los estilos correspondientes
 */

// Función para detectar modo oscuro
function isDarkMode() {
    return document.body.classList.contains('dark') ||
           window.matchMedia('(prefers-color-scheme: dark)').matches;
}

// Función para aplicar tema a un modal
function applyThemeToModal(modal) {
    if (!modal) return;

    // El modal ahora usa las clases del sistema de colores de la aplicación
    // Las clases .card, .input, .btn-primary, .btn-secondary, etc. ya manejan
    // automáticamente los temas claro y oscuro a través de las variables CSS

    // No necesitamos aplicar clases manualmente ya que el sistema de colores
    // de la aplicación se encarga de esto automáticamente

    // Solo aplicamos transiciones suaves si es necesario
    const elements = modal.querySelectorAll('.modal-content, .modal-header, .modal-title, .modal-subtitle, .modal-label, .modal-input, .modal-button-cancel, .modal-button-primary');
    elements.forEach(element => {
        element.classList.add('transition-all', 'duration-200');
    });
}

// Función para aplicar tema a todos los modales
function applyThemeToAllModals() {
    const modals = document.querySelectorAll('[id$="Modal"]');
    modals.forEach(modal => {
        applyThemeToModal(modal);
    });
}

// Función para aplicar tema a un modal específico
function applyThemeToSpecificModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        applyThemeToModal(modal);
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    // Aplicar tema inicial
    applyThemeToAllModals();

    // Observar cambios en el tema
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                applyThemeToAllModals();
            }
        });
    });

    observer.observe(document.body, {
        attributes: true,
        attributeFilter: ['class']
    });

    // Escuchar cambios en las preferencias del sistema
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        applyThemeToAllModals();
    });
});

// Funciones globales
window.applyModalTheme = applyThemeToSpecificModal;
window.refreshModalThemes = applyThemeToAllModals;
