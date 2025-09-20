/**
 * Sistema de Gestión de Temas
 * Maneja el cambio entre modo claro y oscuro
 */

class ThemeManager {
    constructor() {
        // No aplicar tema aquí, ya se aplica en el HTML para evitar FOUC
        this.theme = document.documentElement.getAttribute('data-theme') || 'light';
        this.init();
    }

    init() {
        // No aplicar tema aquí, ya se aplica en el HTML para evitar FOUC
        console.log('Inicializando ThemeManager...');
        console.log('Tema actual:', this.theme);
        this.createThemeToggle();
        this.bindEvents();
    }

    applyTheme() {
        document.documentElement.setAttribute('data-theme', this.theme);
        document.body.className = this.theme === 'dark' ? 'dark' : 'light';
    }

    createThemeToggle() {
        // El botón de tema ya existe en la navegación, solo configurar eventos
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            console.log('Botón de tema encontrado:', themeToggle);
            themeToggle.addEventListener('click', (e) => {
                e.preventDefault();
                console.log('Click en botón de tema');
                this.toggleTheme();
            });
            this.updateToggle();
        } else {
            console.error('Botón de tema no encontrado con id="theme-toggle"');
            // Intentar de nuevo después de un breve delay
            setTimeout(() => {
                const retryToggle = document.getElementById('theme-toggle');
                if (retryToggle) {
                    console.log('Botón de tema encontrado en reintento:', retryToggle);
                    retryToggle.addEventListener('click', (e) => {
                        e.preventDefault();
                        console.log('Click en botón de tema (reintento)');
                        this.toggleTheme();
                    });
                    this.updateToggle();
                }
            }, 100);
        }
    }

    getThemeIcon() {
        return this.theme === 'dark'
            ? `<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
               </svg>`
            : `<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
               </svg>`;
    }

    getThemeTooltip() {
        return this.theme === 'dark' ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro';
    }

    bindEvents() {
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', () => this.toggleTheme());
        }

        // Escuchar cambios en el sistema
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem('theme')) {
                this.theme = e.matches ? 'dark' : 'light';
                this.applyTheme();
                this.updateToggle();
            }
        });
    }

    toggleTheme() {
        this.theme = this.theme === 'light' ? 'dark' : 'light';
        localStorage.setItem('theme', this.theme);
        this.applyTheme();
        this.updateToggle();
        this.showThemeNotification();
    }

    updateToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        if (themeToggle && themeIcon) {
            themeIcon.innerHTML = this.getThemeIconPath();
            themeToggle.setAttribute('title', this.getThemeTooltip());
        }
    }

    getThemeIconPath() {
        return this.theme === 'dark'
            ? 'M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z'
            : 'M12 3v1m0 16v1m9-9h1M3 12H2m15.325-4.325l.707-.707M3.968 3.968l-.707-.707m0 16.064l.707-.707m16.064 0l.707-.707M12 7a5 5 0 100 10 5 5 0 000-10z';
    }

    showThemeNotification() {
        // Crear notificación temporal
        const notification = document.createElement('div');
        notification.className = 'theme-notification';
        notification.textContent = `Modo ${this.theme === 'dark' ? 'oscuro' : 'claro'} activado`;
        notification.style.cssText = `
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1000;
            padding: 12px 20px;
            background: var(--primary-600);
            color: white;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: var(--shadow-lg);
            transform: translateX(100%);
            transition: transform var(--transition-normal);
        `;

        document.body.appendChild(notification);

        // Animar entrada
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Remover después de 3 segundos
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    // Método público para obtener el tema actual
    getCurrentTheme() {
        return this.theme;
    }

    // Método público para establecer un tema específico
    setTheme(theme) {
        if (theme === 'light' || theme === 'dark') {
            this.theme = theme;
            localStorage.setItem('theme', this.theme);
            this.applyTheme();
            this.updateToggle();
        }
    }
}

// Inicializar el gestor de temas cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM cargado, inicializando ThemeManager...');
    window.themeManager = new ThemeManager();
});

// También intentar inicializar inmediatamente si el DOM ya está listo
if (document.readyState === 'loading') {
    // DOM aún cargando, esperar al evento
} else {
    // DOM ya cargado, inicializar inmediatamente
    console.log('DOM ya cargado, inicializando ThemeManager inmediatamente...');
    window.themeManager = new ThemeManager();
}

// Exportar para uso global
window.ThemeManager = ThemeManager;
