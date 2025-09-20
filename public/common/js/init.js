/**
 * Archivo de inicialización principal
 * Contiene toda la lógica de la aplicación organizada en módulos
 */

// ========================================
// MÓDULO DE SIDEBAR
// ========================================
class SidebarManager {
    constructor() {
        this.sidebar = document.getElementById('sidebar');
        this.sidebarToggle = document.getElementById('sidebar-toggle');
        this.sidebarOverlay = document.getElementById('sidebar-overlay');
        this.closeSidebar = document.getElementById('close-sidebar');

        this.init();
    }

    init() {
        if (!this.sidebar || !this.sidebarToggle) return;

        this.bindEvents();
    }

    bindEvents() {
        // Toggle sidebar
        this.sidebarToggle?.addEventListener('click', () => this.toggleSidebar());

        // Close sidebar on overlay click
        this.sidebarOverlay?.addEventListener('click', () => this.closeSidebarMobile());

        // Close sidebar on close button click
        this.closeSidebar?.addEventListener('click', () => this.closeSidebarMobile());
    }

    toggleSidebar() {
        this.sidebar?.classList.toggle('-translate-x-full');
        this.sidebarOverlay?.classList.toggle('hidden');
    }

    closeSidebarMobile() {
        this.sidebar?.classList.add('-translate-x-full');
        this.sidebarOverlay?.classList.add('hidden');
    }
}

// ========================================
// MÓDULO DE DROPDOWN DE USUARIO
// ========================================
class UserDropdownManager {
    constructor() {
        this.userMenuButton = document.getElementById('user-menu-button');
        this.userDropdown = document.getElementById('user-dropdown');

        this.init();
    }

    init() {
        if (!this.userMenuButton || !this.userDropdown) return;

        this.bindEvents();
    }

    bindEvents() {
        // Toggle dropdown
        this.userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            this.toggleUserDropdown();
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!this.userMenuButton.contains(e.target) && !this.userDropdown.contains(e.target)) {
                this.closeUserDropdown();
            }
        });

        // Close dropdown on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeUserDropdown();
            }
        });
    }

    toggleUserDropdown() {
        const isHidden = this.userDropdown.classList.contains('hidden');

        if (isHidden) {
            this.showDropdown();
        } else {
            this.hideDropdown();
        }
    }

    showDropdown() {
        // Show dropdown with animation
        this.userDropdown.classList.remove('hidden');
        this.userDropdown.style.opacity = '0';
        this.userDropdown.style.transform = 'scale(0.95)';

        // Force reflow
        this.userDropdown.offsetHeight;

        // Add transition classes
        this.userDropdown.style.transition = 'opacity 100ms ease-out, transform 100ms ease-out';
        this.userDropdown.style.opacity = '1';
        this.userDropdown.style.transform = 'scale(1)';
    }

    hideDropdown() {
        // Hide dropdown with animation
        this.userDropdown.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
        this.userDropdown.style.opacity = '0';
        this.userDropdown.style.transform = 'scale(0.95)';

        setTimeout(() => {
            this.userDropdown.classList.add('hidden');
            this.userDropdown.style.transition = '';
        }, 75);
    }

    closeUserDropdown() {
        if (!this.userDropdown.classList.contains('hidden')) {
            this.hideDropdown();
        }
    }
}

// ========================================
// MÓDULO DE GESTIÓN DE TEMAS
// ========================================
class ThemeManager {
    constructor() {
        this.currentTheme = null;
        this.init();
    }

    init() {
        this.loadTheme();
        this.bindEvents();
        this.updateThemeInfo();
    }

    loadTheme() {
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        this.currentTheme = savedTheme || (prefersDark ? 'dark' : 'light');
        document.documentElement.setAttribute('data-theme', this.currentTheme);
    }

    bindEvents() {
        // Observar cambios en el atributo data-theme
        const themeObserver = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                    this.currentTheme = document.documentElement.getAttribute('data-theme');
                    this.updateThemeInfo();
                }
            });
        });

        themeObserver.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-theme']
        });
    }

    toggleTheme() {
        const newTheme = this.currentTheme === 'dark' ? 'light' : 'dark';

        // Mostrar notificación
        if (newTheme === 'dark') {
            if (typeof toast !== 'undefined') {
                toast.black(null, null, 'Modo oscuro activado', {
                    duration: 3000
                });
            }
        } else {
            if (typeof toast !== 'undefined') {
                toast.success('Modo claro activado');
            }
        }

        // Aplicar nuevo tema
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        this.currentTheme = newTheme;
        this.updateThemeInfo();
    }

    updateThemeInfo() {
        const currentThemeEl = document.getElementById('current-theme');
        const bodyBgEl = document.getElementById('body-bg');
        const textColorEl = document.getElementById('text-color');
        const themeIconLight = document.getElementById('theme-icon-light');
        const themeIconDark = document.getElementById('theme-icon-dark');

        if (currentThemeEl) currentThemeEl.textContent = this.currentTheme;

        if (bodyBgEl || textColorEl) {
            const bodyStyles = window.getComputedStyle(document.body);
            if (bodyBgEl) bodyBgEl.textContent = bodyStyles.backgroundColor;
            if (textColorEl) textColorEl.textContent = bodyStyles.color;
        }

        // Actualizar iconos de tema
        if (themeIconLight && themeIconDark) {
            if (this.currentTheme === 'dark') {
                themeIconLight?.classList.add('hidden');
                themeIconDark?.classList.remove('hidden');
            } else {
                themeIconLight?.classList.remove('hidden');
                themeIconDark?.classList.add('hidden');
            }
        }
    }

    isDarkMode() {
        return this.currentTheme === 'dark' ||
               document.documentElement.classList.contains('dark') ||
               localStorage.getItem('theme') === 'dark' ||
               (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
    }
}

// ========================================
// MÓDULO DE UTILIDADES
// ========================================
class Utils {
    static debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    static throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    static formatDate(date) {
        return new Intl.DateTimeFormat('es-ES', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        }).format(new Date(date));
    }

    static formatCurrency(amount) {
        return new Intl.NumberFormat('es-ES', {
            style: 'currency',
            currency: 'EUR'
        }).format(amount);
    }
}

// ========================================
// MÓDULO DE GESTIÓN DE MODALES
// ========================================
class ModalManager {
    constructor() {
        this.activeModals = new Set();
        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        // Cerrar modales con Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeAllModals();
            }
        });

        // Cerrar modales al hacer clic en el overlay
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay') || e.target.classList.contains('modal-container')) {
                const modal = e.target.closest('[id$="Modal"]');
                if (modal) {
                    this.closeModal(modal.id);
                }
            }
        });
    }

    openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            this.activeModals.add(modalId);

            // Aplicar tema si está disponible
            if (window.applyModalTheme) {
                window.applyModalTheme(modalId);
            }
        }
    }

    closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            this.activeModals.delete(modalId);
        }
    }

    closeAllModals() {
        this.activeModals.forEach(modalId => {
            this.closeModal(modalId);
        });
    }

    toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            if (modal.classList.contains('hidden')) {
                this.openModal(modalId);
            } else {
                this.closeModal(modalId);
            }
        }
    }
}

// ========================================
// INICIALIZACIÓN PRINCIPAL
// ========================================
class App {
    constructor() {
        this.sidebarManager = null;
        this.userDropdownManager = null;
        this.themeManager = null;
        this.modalManager = null;

        this.init();
    }

    init() {
        // Esperar a que el DOM esté listo
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.initializeModules());
        } else {
            this.initializeModules();
        }
    }

    initializeModules() {
        try {
            // Inicializar módulos
            this.sidebarManager = new SidebarManager();
            this.userDropdownManager = new UserDropdownManager();
            this.themeManager = new ThemeManager();
            this.modalManager = new ModalManager();

            // Hacer funciones globales disponibles
            this.exposeGlobalFunctions();

            console.log('✅ Aplicación inicializada correctamente');
        } catch (error) {
            console.error('❌ Error al inicializar la aplicación:', error);
        }
    }

    exposeGlobalFunctions() {
        // Funciones de tema
        window.toggleTheme = () => this.themeManager.toggleTheme();
        window.isDarkMode = () => this.themeManager.isDarkMode();

        // Funciones de modales
        window.openModal = (modalId) => this.modalManager.openModal(modalId);
        window.closeModal = (modalId) => this.modalManager.closeModal(modalId);
        window.toggleModal = (modalId) => this.modalManager.toggleModal(modalId);

        // Funciones de utilidades
        window.Utils = Utils;
    }
}

// ========================================
// FUNCIONES GLOBALES ESPECÍFICAS DE LA APLICACIÓN
// ========================================

// Función para abrir el modal de crear usuario
function openCreateUserModal() {
    if (window.openModal) {
        window.openModal('createUserModal');
    } else {
        // Fallback si el sistema de modales no está disponible
        const modal = document.getElementById('createUserModal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }
}

// Función para cerrar el modal de crear usuario
function closeCreateUserModal() {
    if (window.closeModal) {
        window.closeModal('createUserModal');
    } else {
        // Fallback si el sistema de modales no está disponible
        const modal = document.getElementById('createUserModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }
}

// Hacer funciones específicas globales
window.openCreateUserModal = openCreateUserModal;
window.closeCreateUserModal = closeCreateUserModal;

// ========================================
// INICIALIZAR APLICACIÓN
// ========================================
const app = new App();

// ========================================
// PRUEBAS DE DESARROLLO (descomenta para probar)
// ========================================
/*
// Pruebas de toast
if (typeof toast !== 'undefined') {
    setTimeout(() => {
        toast.success('Aplicación inicializada correctamente');
    }, 1000);
}

// Pruebas de modales
setTimeout(() => {
    console.log('Modales activos:', app.modalManager?.activeModals);
}, 2000);
*/
