/**
 * Ejemplo de integración del sistema de temas para modales
 * Incluir este archivo después de modal-theme.js
 */

// Función para inicializar el modal de crear usuario con el sistema de temas
function initializeCreateUserModal() {
    // Aplicar tema al modal cuando se abra
    const modal = document.getElementById('createUserModal');
    if (modal) {
        // Aplicar tema inicial
        if (window.modalThemeManager) {
            window.modalThemeManager.applyThemeToSpecificModal('createUserModal');
        }

        // Observar cuando el modal se muestra
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (!modal.classList.contains('hidden')) {
                        // Modal visible, aplicar tema
                        if (window.modalThemeManager) {
                            window.modalThemeManager.applyThemeToSpecificModal('createUserModal');
                        }
                    }
                }
            });
        });

        observer.observe(modal, {
            attributes: true,
            attributeFilter: ['class']
        });
    }
}

// Función para abrir el modal de crear usuario
function openCreateUserModal() {
    const modal = document.getElementById('createUserModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Aplicar tema después de mostrar el modal
        setTimeout(() => {
            if (window.modalThemeManager) {
                window.modalThemeManager.applyThemeToSpecificModal('createUserModal');
            }
        }, 100);
    }
}

// Función para cerrar el modal de crear usuario
function closeCreateUserModal() {
    const modal = document.getElementById('createUserModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    initializeCreateUserModal();

    // Aplicar tema a todos los modales existentes
    if (window.modalThemeManager) {
        window.modalThemeManager.refreshAllModals();
    }
});

// Función para crear un nuevo modal con el sistema de temas
function createThemedModal(modalId, title, content) {
    const modalHTML = `
        <div id="${modalId}" class="modal-container">
            <div class="modal-content modal-theme-applied">
                <div class="modal-header modal-theme-applied flex items-center justify-between p-4 border-b">
                    <div>
                        <h3 class="modal-title modal-theme-applied text-xl font-bold flex items-center">
                            ${title}
                        </h3>
                    </div>
                    <button type="button" onclick="closeModal('${modalId}')" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    ${content}
                </div>
            </div>
        </div>
    `;

    // Agregar al body
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    // Aplicar tema al nuevo modal
    if (window.modalThemeManager) {
        window.modalThemeManager.applyThemeToSpecificModal(modalId);
    }

    return modalId;
}

// Función para cerrar cualquier modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

// Función para mostrar cualquier modal
function showModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Aplicar tema
        if (window.modalThemeManager) {
            window.modalThemeManager.applyThemeToSpecificModal(modalId);
        }
    }
}

// Exportar funciones globales
window.openCreateUserModal = openCreateUserModal;
window.closeCreateUserModal = closeCreateUserModal;
window.createThemedModal = createThemedModal;
window.closeModal = closeModal;
window.showModal = showModal;
