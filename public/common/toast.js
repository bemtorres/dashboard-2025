/**
 * Sistema de Toast/Alertas Global
 * Sistema moderno de notificaciones para la aplicación
 *
 * Uso:
 * toast.success('Mensaje')
 * toast.success('Mensaje', duración, 'Título personalizado')
 * toast.error('Mensaje', duración, 'Título', opciones)
 * toast.warning('Mensaje')
 * toast.info('Mensaje')
 * toast.black('Mensaje')
 * toast.custom('tipo', 'mensaje', duración, 'título', opciones)
 */

class ToastManager {
    constructor() {
        this.container = null;
        this.toasts = new Map();
        this.defaultDuration = 5000;
        this.maxToasts = 5;
        this.init();
    }

    init() {
        this.createContainer();
        this.addStyles();
        console.log('🍞 Toast Manager inicializado');
    }

    createContainer() {
        this.container = document.createElement('div');
        this.container.id = 'toast-container';
        this.container.style.cssText = `
            position: fixed;
            top: 50px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            pointer-events: none;
        `;
        document.body.appendChild(this.container);
    }

    addStyles() {
        if (!document.getElementById('toast-styles')) {
            const style = document.createElement('style');
            style.id = 'toast-styles';
            style.textContent = `
                @keyframes toast-slide-in {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }

                @keyframes toast-slide-out {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }

                @keyframes toast-progress {
                    from { transform: scaleX(1); }
                    to { transform: scaleX(0); }
                }

                .toast-item {
                    animation: toast-slide-in 0.3s ease-out;
                }

                .toast-item.toast-removing {
                    animation: toast-slide-out 0.3s ease-in forwards;
                }

                .toast-progress-bar {
                    animation: toast-progress linear forwards;
                }

                .toast-item:hover .toast-progress-bar {
                    animation-play-state: paused;
                }

                .toast-item a {
                    color: rgba(255, 255, 255, 0.9);
                    text-decoration: underline;
                    font-weight: 500;
                    transition: color 0.2s ease;
                }

                .toast-item a:hover {
                    color: white;
                    text-decoration: none;
                }

                .toast-item strong {
                    font-weight: 600;
                }

                .toast-item em {
                    font-style: italic;
                }
            `;
            document.head.appendChild(style);
        }
    }

    getToastConfig(type) {
        const configs = {
            success: {
                bg: '#10b981',
                icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                iconColor: 'white',
                title: 'Éxito'
            },
            error: {
                bg: '#ef4444',
                icon: 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                iconColor: 'white',
                title: 'Error'
            },
            warning: {
                bg: '#f59e0b',
                icon: 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z',
                iconColor: 'white',
                title: 'Advertencia'
            },
            info: {
                bg: '#3b82f6',
                icon: 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                iconColor: 'white',
                title: 'Información'
            },
            black: {
              bg: '#212121',
              icon: 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z',
              iconColor: 'white',
              title: 'Negro'
            }
        };

        return configs[type] || configs.info;
    }

    createToast(type, message, duration = null, title = null, options = {}) {
        const config = this.getToastConfig(type);
        const toastDuration = duration || this.defaultDuration;
        const toastTitle = (title && title.trim() !== '') ? title : (options.title && options.title.trim() !== '') ? options.title : config.title;

        // Validar que al menos el mensaje o el título tengan contenido
        const hasMessage = message && message.trim() !== '';
        const hasTitle = toastTitle && toastTitle.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }

        const toastId = Date.now() + Math.random();

        // Limitar número de toasts
        if (this.toasts.size >= this.maxToasts) {
            const oldestToast = this.toasts.keys().next().value;
            this.removeToast(oldestToast);
        }

        const toast = document.createElement('div');
        toast.id = `toast-${toastId}`;
        toast.className = 'toast-item';
        toast.style.cssText = `
            display: flex;
            align-items: flex-start;
            padding: 16px 20px;
            background-color: ${config.bg};
            color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            min-width: 320px;
            max-width: 400px;
            position: relative;
            overflow: hidden;
            pointer-events: auto;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        `;

        // Contenido del toast
        const titleHtml = hasTitle ? `
            <div style="font-weight: 600; font-size: 14px; margin-bottom: 4px; opacity: 0.9;">
                ${toastTitle}
            </div>
        ` : '';

        const messageHtml = hasMessage ? `
            <div style="font-size: 14px; line-height: 1.4; word-wrap: break-word;">
                ${message}
            </div>
        ` : '';

        toast.innerHTML = `
            <div style="display: flex; align-items: flex-start; flex: 1; gap: 12px;">
                <div style="flex-shrink: 0; margin-top: 2px;">
                    <svg width="20" height="20" fill="none" stroke="${config.iconColor}" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${config.icon}"></path>
                    </svg>
                </div>
                <div style="flex: 1; min-width: 0;">
                    ${titleHtml}
                    ${messageHtml}
                </div>
                <button id="close-btn-${toastId}" style="
                    background: none;
                    border: none;
                    color: white;
                    cursor: pointer;
                    padding: 4px;
                    border-radius: 4px;
                    transition: background-color 0.2s;
                    flex-shrink: 0;
                    opacity: 0.7;
                    margin-top: -2px;
                ">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;

        // Agregar event listener para el botón de cerrar
        const closeBtn = toast.querySelector(`[id="close-btn-${toastId}"]`);
        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            this.removeToast(toastId);
        });

        // Agregar efectos hover
        closeBtn.addEventListener('mouseover', function() {
            this.style.backgroundColor = 'rgba(255,255,255,0.2)';
            this.style.opacity = '1';
        });

        closeBtn.addEventListener('mouseout', function() {
            this.style.backgroundColor = 'transparent';
            this.style.opacity = '0.7';
        });

        // Barra de progreso
        if (toastDuration > 0) {
            const progressBar = document.createElement('div');
            progressBar.className = 'toast-progress-bar';
            progressBar.style.cssText = `
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                background-color: rgba(255, 255, 255, 0.3);
                width: 100%;
                transform-origin: left;
                animation-duration: ${toastDuration}ms;
            `;
            toast.appendChild(progressBar);
        }

        // Agregar al contenedor
        this.container.appendChild(toast);
        this.toasts.set(toastId, toast);

        // Auto-remover
        if (toastDuration > 0) {
            setTimeout(() => {
                this.removeToast(toastId);
            }, toastDuration);
        }

        return toastId;
    }

    removeToast(toastId) {
        const toast = this.toasts.get(toastId);
        if (toast) {
            toast.classList.add('toast-removing');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
                this.toasts.delete(toastId);
            }, 300);
        }
    }

    clear() {
        this.toasts.forEach((_, id) => {
            this.removeToast(id);
        });
    }

    // Métodos de conveniencia
    success(message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.success: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast('success', message, duration, title, options);
    }

    error(message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.error: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast('error', message, duration, title, options);
    }

    warning(message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.warning: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast('warning', message, duration, title, options);
    }

    info(message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.info: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast('info', message, duration, title, options);
    }

    custom(type, message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.custom: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast(type, message, duration, title, options);
    }

    black(message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.black: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast('black', message, duration, title, options);
    }

    // Método de compatibilidad con alert()
    show(type, message, duration, title) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.show: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }
        return this.createToast(type, message, duration, title);
    }

    // Método para crear toasts con HTML
    html(type, message, duration = null, title = null, options = {}) {
        const hasMessage = message && message.trim() !== '';
        const hasTitle = title && title.trim() !== '';

        if (!hasMessage && !hasTitle) {
            console.warn('⚠️ Toast.html: No se puede mostrar un toast sin mensaje ni título');
            return null;
        }

        // Marcar que este toast contiene HTML
        const htmlOptions = { ...options, allowHtml: true };
        return this.createToast(type, message, duration, title, htmlOptions);
    }
}

// Crear instancia global
const toastManager = new ToastManager();

// Exportar para uso global - mantener la instancia del ToastManager
window.toast = toastManager;
window.toastManager = toastManager;

// Compatibilidad con alert() anterior
window.alert = function(type, message, duration) {
    return toastManager.show(type, message, duration);
};

// Métodos de conveniencia globales
window.toastSuccess = (message, duration, title, options) => {
    const hasMessage = message && message.trim() !== '';
    const hasTitle = title && title.trim() !== '';

    if (!hasMessage && !hasTitle) {
        console.warn('⚠️ toastSuccess: No se puede mostrar un toast sin mensaje ni título');
        return null;
    }
    return toastManager.success(message, duration, title, options);
};
window.toastError = (message, duration, title, options) => {
    const hasMessage = message && message.trim() !== '';
    const hasTitle = title && title.trim() !== '';

    if (!hasMessage && !hasTitle) {
        console.warn('⚠️ toastError: No se puede mostrar un toast sin mensaje ni título');
        return null;
    }
    return toastManager.error(message, duration, title, options);
};
window.toastWarning = (message, duration, title, options) => {
    const hasMessage = message && message.trim() !== '';
    const hasTitle = title && title.trim() !== '';

    if (!hasMessage && !hasTitle) {
        console.warn('⚠️ toastWarning: No se puede mostrar un toast sin mensaje ni título');
        return null;
    }
    return toastManager.warning(message, duration, title, options);
};
window.toastInfo = (message, duration, title, options) => {
    const hasMessage = message && message.trim() !== '';
    const hasTitle = title && title.trim() !== '';

    if (!hasMessage && !hasTitle) {
        console.warn('⚠️ toastInfo: No se puede mostrar un toast sin mensaje ni título');
        return null;
    }
    return toastManager.info(message, duration, title, options);
};
window.toastBlack = (message, duration, title, options) => {
    const hasMessage = message && message.trim() !== '';
    const hasTitle = title && title.trim() !== '';

    if (!hasMessage && !hasTitle) {
        console.warn('⚠️ toastBlack: No se puede mostrar un toast sin mensaje ni título');
        return null;
    }
    return toastManager.black(message, duration, title, options);
};

// Funciones globales para HTML
window.toastHtml = (type, message, duration, title, options) => {
    const hasMessage = message && message.trim() !== '';
    const hasTitle = title && title.trim() !== '';

    if (!hasMessage && !hasTitle) {
        console.warn('⚠️ toastHtml: No se puede mostrar un toast sin mensaje ni título');
        return null;
    }
    return toastManager.html(type, message, duration, title, options);
};

window.toastSuccessHtml = (message, duration, title, options) => {
    return toastManager.html('success', message, duration, title, options);
};

window.toastErrorHtml = (message, duration, title, options) => {
    return toastManager.html('error', message, duration, title, options);
};

window.toastWarningHtml = (message, duration, title, options) => {
    return toastManager.html('warning', message, duration, title, options);
};

window.toastInfoHtml = (message, duration, title, options) => {
    return toastManager.html('info', message, duration, title, options);
};

// Verificar que toast esté disponible globalmente
if (typeof window.toast === 'undefined') {
    console.error('❌ Error: toast no se pudo inicializar correctamente');
} else {
    console.log('✅ Sistema de Toast cargado y disponible globalmente');
}

// Verificar funciones HTML
if (typeof window.toastSuccessHtml === 'undefined') {
    console.error('❌ Error: Funciones HTML no se pudieron inicializar');
} else {
    console.log('✅ Funciones HTML de Toast cargadas correctamente');
}

// Función de prueba para verificar que funciona
window.testToast = function() {
    if (window.toast) {
        toast.success('¡Sistema de Toast funcionando correctamente!');
        return true;
    } else {
        console.error('❌ toast no está disponible');
        return false;
    }
};

// Función de prueba para HTML
window.testToastHtml = function() {
    if (window.toast) {
        toastSuccessHtml('¡Toast con <strong>HTML</strong> funcionando! <a href="#" onclick="alert(\'Enlace clickeado\')">Haz clic aquí</a>');
        return true;
    } else {
        console.error('❌ toast no está disponible');
        return false;
    }
};
