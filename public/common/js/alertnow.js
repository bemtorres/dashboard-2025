/**
 * Sistema de Modales Swoaler
 * Sistema moderno de modales con iconos grandes similar a SweetAlert
 *
 * Uso:
 * swoaler.success('Título', 'Mensaje')
 * swoaler.error('Título', 'Mensaje')
 * swoaler.warning('Título', 'Mensaje')
 * swoaler.info('Título', 'Mensaje')
 * swoaler.question('Título', 'Mensaje')
 * swoaler.custom('tipo', 'título', 'mensaje', opciones)
 */

class SwoalerManager {
    constructor() {
        this.modals = new Map();
        this.zIndex = 10000;
        this.init();
    }

    init() {
        this.addStyles();
        console.log('🎭 Swoaler Manager inicializado');
    }

    addStyles() {
        if (!document.getElementById('swoaler-styles')) {
            const style = document.createElement('style');
            style.id = 'swoaler-styles';
            style.textContent = `
                @keyframes swoaler-fade-in {
                    from {
                        opacity: 0;
                        transform: scale(0.7);
                    }
                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                @keyframes swoaler-fade-out {
                    from {
                        opacity: 1;
                        transform: scale(1);
                    }
                    to {
                        opacity: 0;
                        transform: scale(0.7);
                    }
                }

                @keyframes swoaler-backdrop-fade-in {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }

                @keyframes swoaler-backdrop-fade-out {
                    from { opacity: 1; }
                    to { opacity: 0; }
                }

                .swoaler-backdrop {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.4);
                    z-index: 10000;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    animation: swoaler-backdrop-fade-in 0.3s ease-out;
                }

                .swoaler-backdrop.swoaler-removing {
                    animation: swoaler-backdrop-fade-out 0.3s ease-in forwards;
                }

                .swoaler-modal {
                    background: white;
                    border-radius: 16px;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                    max-width: 500px;
                    width: 90%;
                    max-height: 90vh;
                    overflow: hidden;
                    animation: swoaler-fade-in 0.3s ease-out;
                    position: relative;
                }

                .swoaler-modal.swoaler-removing {
                    animation: swoaler-fade-out 0.3s ease-in forwards;
                }

                .swoaler-icon {
                    width: 80px;
                    height: 80px;
                    margin: 0 auto 20px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                }

                .swoaler-icon svg {
                    width: 40px;
                    height: 40px;
                }

                .swoaler-content {
                    padding: 30px;
                    text-align: center;
                }

                .swoaler-title {
                    font-size: 24px;
                    font-weight: 600;
                    margin-bottom: 12px;
                    color: #1f2937;
                    line-height: 1.3;
                }

                .swoaler-message {
                    font-size: 16px;
                    color: #6b7280;
                    line-height: 1.5;
                    margin-bottom: 30px;
                }

                .swoaler-buttons {
                    display: flex;
                    gap: 12px;
                    justify-content: center;
                    flex-wrap: wrap;
                }

                .swoaler-btn {
                    padding: 12px 24px;
                    border: none;
                    border-radius: 8px;
                    font-size: 14px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    min-width: 100px;
                }

                .swoaler-btn:hover {
                    transform: translateY(-1px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                }

                .swoaler-btn:active {
                    transform: translateY(0);
                }

                .swoaler-btn-primary {
                    background: #3b82f6;
                    color: white;
                }

                .swoaler-btn-primary:hover {
                    background: #2563eb;
                }

                .swoaler-btn-secondary {
                    background: #f3f4f6;
                    color: #374151;
                }

                .swoaler-btn-secondary:hover {
                    background: #e5e7eb;
                }

                .swoaler-btn-success {
                    background: #10b981;
                    color: white;
                }

                .swoaler-btn-success:hover {
                    background: #059669;
                }

                .swoaler-btn-danger {
                    background: #ef4444;
                    color: white;
                }

                .swoaler-btn-danger:hover {
                    background: #dc2626;
                }

                .swoaler-close {
                    position: absolute;
                    top: 16px;
                    right: 16px;
                    background: none;
                    border: none;
                    font-size: 24px;
                    color: #9ca3af;
                    cursor: pointer;
                    width: 32px;
                    height: 32px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    transition: all 0.2s ease;
                }

                .swoaler-close:hover {
                    background: #f3f4f6;
                    color: #374151;
                }

                .swoaler-timer-bar {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    height: 6px;
                    width: 100%;
                    background: linear-gradient(90deg, #3b82f6, #10b981);
                    border-radius: 0 0 16px 16px;
                    transform-origin: left;
                    animation: swoaler-timer linear forwards;
                    z-index: 10;
                }

                .swoaler-timer-bar.swoaler-timer-paused {
                    animation-play-state: paused;
                }

                @keyframes swoaler-timer {
                    from {
                        transform: scaleX(1);
                        opacity: 1;
                    }
                    to {
                        transform: scaleX(0);
                        opacity: 0.8;
                    }
                }

                .swoaler-timer-text {
                    position: absolute;
                    top: 16px;
                    left: 16px;
                    background: rgba(0, 0, 0, 0.1);
                    color: #6b7280;
                    padding: 4px 8px;
                    border-radius: 12px;
                    font-size: 12px;
                    font-weight: 500;
                    backdrop-filter: blur(10px);
                }

                .swoaler-progress-bar {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    height: 8px;
                    width: 100%;
                    background: linear-gradient(90deg, #ef4444, #f59e0b, #10b981);
                    border-radius: 0 0 16px 16px;
                    transform-origin: left;
                    animation: swoaler-progress linear forwards;
                    z-index: 10;
                }

                .swoaler-progress-bar.swoaler-progress-paused {
                    animation-play-state: paused;
                }

                @keyframes swoaler-progress {
                    from {
                        transform: scaleX(1);
                        opacity: 1;
                    }
                    to {
                        transform: scaleX(0);
                        opacity: 0.8;
                    }
                }

                .swoaler-progress-text {
                    position: absolute;
                    top: 16px;
                    right: 16px;
                    background: rgba(0, 0, 0, 0.1);
                    color: #6b7280;
                    padding: 4px 8px;
                    border-radius: 12px;
                    font-size: 12px;
                    font-weight: 500;
                    backdrop-filter: blur(10px);
                }

                @media (max-width: 640px) {
                    .swoaler-modal {
                        width: 95%;
                        margin: 20px;
                    }

                    .swoaler-content {
                        padding: 20px;
                    }

                    .swoaler-title {
                        font-size: 20px;
                    }

                    .swoaler-message {
                        font-size: 14px;
                    }

                    .swoaler-buttons {
                        flex-direction: column;
                    }

                    .swoaler-btn {
                        width: 100%;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }

    getModalConfig(type) {
        const configs = {
            success: {
                iconBg: '#d1fae5',
                iconColor: '#10b981',
                icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                buttonClass: 'swoaler-btn-success',
                buttonText: 'Aceptar'
            },
            error: {
                iconBg: '#fee2e2',
                iconColor: '#ef4444',
                icon: 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                buttonClass: 'swoaler-btn-danger',
                buttonText: 'Aceptar'
            },
            warning: {
                iconBg: '#fef3c7',
                iconColor: '#f59e0b',
                icon: 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z',
                buttonClass: 'swoaler-btn-primary',
                buttonText: 'Aceptar'
            },
            info: {
                iconBg: '#dbeafe',
                iconColor: '#3b82f6',
                icon: 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                buttonClass: 'swoaler-btn-primary',
                buttonText: 'Aceptar'
            },
            question: {
                iconBg: '#e0e7ff',
                iconColor: '#8b5cf6',
                icon: 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                buttonClass: 'swoaler-btn-primary',
                buttonText: 'Aceptar'
            }
        };

        return configs[type] || configs.info;
    }

    createModal(type, title, message, options = {}) {
        // Validar que al menos el título o el mensaje tengan contenido
        const hasTitle = title && title.trim() !== '';
        const hasMessage = message && message.trim() !== '';

        if (!hasTitle && !hasMessage) {
            console.warn('⚠️ Swoaler: No se puede mostrar un modal sin título ni mensaje');
            return null;
        }

        const config = this.getModalConfig(type);
        const modalId = Date.now() + Math.random();
        const zIndex = this.zIndex++;
        const timerDuration = options.timer || options.duration || null;
        const showTimer = timerDuration && timerDuration > 0;
        const timerType = options.timerType || 'timer'; // 'timer' o 'progress'
        const showButtons = options.showButtons !== false; // Por defecto mostrar botones

        // Crear backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'swoaler-backdrop';
        backdrop.style.zIndex = zIndex;
        backdrop.id = `swoaler-backdrop-${modalId}`;

        // Crear modal
        const modal = document.createElement('div');
        modal.className = 'swoaler-modal';
        modal.id = `swoaler-modal-${modalId}`;

        // Contenido del modal
        const titleHtml = hasTitle ? `
            <div class="swoaler-title">${title}</div>
        ` : '';

        const messageHtml = hasMessage ? `
            <div class="swoaler-message">${message}</div>
        ` : '';

        // Generar botones según configuración
        const buttonsHtml = showButtons ? `
            <div class="swoaler-buttons">
                <button class="swoaler-btn ${config.buttonClass}" onclick="window.window.swoalerManager.closeModal('${modalId}')">
                    ${options.confirmText || config.buttonText}
                </button>
                ${options.showCancel ? `
                    <button class="swoaler-btn swoaler-btn-secondary" onclick="window.window.swoalerManager.closeModal('${modalId}', false)">
                        ${options.cancelText || 'Cancelar'}
                    </button>
                ` : ''}
            </div>
        ` : '';

        // Generar temporizador según tipo
        const timerHtml = showTimer ? (() => {
            if (timerType === 'progress') {
                return `
                    <div class="swoaler-progress-text" id="swoaler-progress-${modalId}">${Math.ceil(timerDuration / 1000)}s</div>
                    <div class="swoaler-progress-bar" id="swoaler-progress-bar-${modalId}" style="animation-duration: ${timerDuration}ms;"></div>
                `;
            } else {
                return `
                    <div class="swoaler-timer-text" id="swoaler-timer-${modalId}">${Math.ceil(timerDuration / 1000)}s</div>
                    <div class="swoaler-timer-bar" id="swoaler-timer-bar-${modalId}" style="animation-duration: ${timerDuration}ms;"></div>
                `;
            }
        })() : '';

        modal.innerHTML = `
            <button class="swoaler-close" onclick="window.swoalerManager.closeModal('${modalId}')">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            ${timerHtml}
            <div class="swoaler-content">
                <div class="swoaler-icon" style="background-color: ${config.iconBg};">
                    <svg fill="none" stroke="${config.iconColor}" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${config.icon}"></path>
                    </svg>
                </div>
                ${titleHtml}
                ${messageHtml}
                ${buttonsHtml}
            </div>
        `;

        // Agregar al DOM
        backdrop.appendChild(modal);
        document.body.appendChild(backdrop);

        // Guardar referencia (se actualizará con los temporizadores después)
        this.modals.set(modalId, {
            backdrop,
            modal,
            type,
            title,
            message,
            options,
            timerDuration,
            showTimer,
            timerInterval: null,
            autoCloseTimeout: null
        });

        // Configurar temporizador si es necesario
        let timerInterval = null;
        let autoCloseTimeout = null;

        if (showTimer) {
            // Actualizar contador visual cada segundo
            timerInterval = setInterval(() => {
                const timerElement = document.getElementById(timerType === 'progress' ? `swoaler-progress-${modalId}` : `swoaler-timer-${modalId}`);
                if (timerElement) {
                    const currentTime = parseInt(timerElement.textContent);
                    if (currentTime > 1) {
                        timerElement.textContent = `${currentTime - 1}s`;
                    }
                }
            }, 1000);

            // Auto-cerrar después del tiempo especificado
            autoCloseTimeout = setTimeout(() => {
                this.closeModal(modalId);
            }, timerDuration);

            // Pausar temporizador al hacer hover
            modal.addEventListener('mouseenter', () => {
                const timerBar = document.getElementById(timerType === 'progress' ? `swoaler-progress-bar-${modalId}` : `swoaler-timer-bar-${modalId}`);
                if (timerBar) {
                    timerBar.classList.add(timerType === 'progress' ? 'swoaler-progress-paused' : 'swoaler-timer-paused');
                }
            });

            // Reanudar temporizador al quitar hover
            modal.addEventListener('mouseleave', () => {
                const timerBar = document.getElementById(timerType === 'progress' ? `swoaler-progress-bar-${modalId}` : `swoaler-timer-bar-${modalId}`);
                if (timerBar) {
                    timerBar.classList.remove(timerType === 'progress' ? 'swoaler-progress-paused' : 'swoaler-timer-paused');
                }
            });

            // Guardar referencias de los temporizadores
            const modalData = this.modals.get(modalId);
            modalData.timerInterval = timerInterval;
            modalData.autoCloseTimeout = autoCloseTimeout;
        }

        // Cerrar al hacer clic en el backdrop
        backdrop.addEventListener('click', (e) => {
            if (e.target === backdrop) {
                this.closeModal(modalId);
            }
        });

        // Cerrar con Escape
        const handleEscape = (e) => {
            if (e.key === 'Escape') {
                this.closeModal(modalId);
                document.removeEventListener('keydown', handleEscape);
            }
        };
        document.addEventListener('keydown', handleEscape);

        return modalId;
    }

    closeModal(modalId, result = true) {
        const modalData = this.modals.get(modalId);
        if (!modalData) return;

        const { backdrop, modal } = modalData;

        // Limpiar temporizadores si existen
        if (modalData.timerInterval) {
            clearInterval(modalData.timerInterval);
        }
        if (modalData.autoCloseTimeout) {
            clearTimeout(modalData.autoCloseTimeout);
        }

        // Agregar clase de animación de salida
        backdrop.classList.add('swoaler-removing');
        modal.classList.add('swoaler-removing');

        // Remover después de la animación
        setTimeout(() => {
            if (backdrop.parentNode) {
                backdrop.parentNode.removeChild(backdrop);
            }
            this.modals.delete(modalId);
        }, 300);

        // Ejecutar callback si existe
        if (modalData.options.callback) {
            modalData.options.callback(result);
        }
    }

    // Métodos de conveniencia
    success(title, message, options = {}) {
        return this.createModal('success', title, message, options);
    }

    error(title, message, options = {}) {
        return this.createModal('error', title, message, options);
    }

    warning(title, message, options = {}) {
        return this.createModal('warning', title, message, options);
    }

    info(title, message, options = {}) {
        return this.createModal('info', title, message, options);
    }

    question(title, message, options = {}) {
        return this.createModal('question', title, message, options);
    }

    custom(type, title, message, options = {}) {
        return this.createModal(type, title, message, options);
    }

    // Método para confirmación con callback
    confirm(title, message, callback, options = {}) {
        const confirmOptions = {
            ...options,
            showCancel: true,
            confirmText: options.confirmText || 'Confirmar',
            cancelText: options.cancelText || 'Cancelar',
            callback: callback
        };
        return this.createModal('question', title, message, confirmOptions);
    }

    // Método para confirmación con acciones personalizadas
    confirmWithActions(title, message, actions = {}, options = {}) {
        const confirmOptions = {
            ...options,
            showCancel: true,
            confirmText: actions.confirmText || 'Confirmar',
            cancelText: actions.cancelText || 'Cancelar',
            callback: (result) => {
                if (result && actions.onConfirm) {
                    actions.onConfirm();
                } else if (!result && actions.onCancel) {
                    actions.onCancel();
                }
            }
        };
        return this.createModal('question', title, message, confirmOptions);
    }

    // Método para modales con múltiples opciones
    choose(title, message, choices = [], options = {}) {
        const config = this.getModalConfig('question');
        const modalId = Date.now() + Math.random();
        const zIndex = this.zIndex++;

        // Crear backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'swoaler-backdrop';
        backdrop.style.zIndex = zIndex;
        backdrop.id = `swoaler-backdrop-${modalId}`;

        // Crear modal
        const modal = document.createElement('div');
        modal.className = 'swoaler-modal';
        modal.id = `swoaler-modal-${modalId}`;

        // Generar botones de opciones
        const buttonsHtml = choices.map((choice, index) => `
            <button class="swoaler-btn ${choice.class || 'swoaler-btn-primary'}"
                    onclick="window.swoalerManager.handleChoice('${modalId}', ${index})">
                ${choice.text}
            </button>
        `).join('');

        modal.innerHTML = `
            <button class="swoaler-close" onclick="window.swoalerManager.closeModal('${modalId}')">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="swoaler-content">
                <div class="swoaler-icon" style="background-color: ${config.iconBg};">
                    <svg fill="none" stroke="${config.iconColor}" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${config.icon}"></path>
                    </svg>
                </div>
                <div class="swoaler-title">${title}</div>
                <div class="swoaler-message">${message}</div>
                <div class="swoaler-buttons">
                    ${buttonsHtml}
                </div>
            </div>
        `;

        // Agregar al DOM
        backdrop.appendChild(modal);
        document.body.appendChild(backdrop);

        // Guardar referencia con choices
        this.modals.set(modalId, {
            backdrop,
            modal,
            type: 'question',
            title,
            message,
            options,
            choices
        });

        // Cerrar al hacer clic en el backdrop
        backdrop.addEventListener('click', (e) => {
            if (e.target === backdrop) {
                this.closeModal(modalId);
            }
        });

        // Cerrar con Escape
        const handleEscape = (e) => {
            if (e.key === 'Escape') {
                this.closeModal(modalId);
                document.removeEventListener('keydown', handleEscape);
            }
        };
        document.addEventListener('keydown', handleEscape);

        return modalId;
    }

    // Manejar selección de opción
    handleChoice(modalId, choiceIndex) {
        const modalData = this.modals.get(modalId);
        if (!modalData || !modalData.choices) return;

        const choice = modalData.choices[choiceIndex];
        if (choice && choice.action) {
            choice.action();
        }

        // Ejecutar callback general si existe
        if (modalData.options.callback) {
            modalData.options.callback(choice, choiceIndex);
        }

        this.closeModal(modalId);
    }

    // Cerrar todos los modales
    closeAll() {
        this.modals.forEach((_, id) => {
            this.closeModal(id);
        });
    }
}

// Crear instancia global
const swoalerManager = new SwoalerManager();

// Exportar para uso global
window.swoaler = swoalerManager;
window.swoalerManager = swoalerManager;

// Métodos de conveniencia globales
window.swoalerSuccess = (title, message, options) => swoalerManager.success(title, message, options);
window.swoalerError = (title, message, options) => swoalerManager.error(title, message, options);
window.swoalerWarning = (title, message, options) => swoalerManager.warning(title, message, options);
window.swoalerInfo = (title, message, options) => swoalerManager.info(title, message, options);
window.swoalerQuestion = (title, message, options) => swoalerManager.question(title, message, options);
window.swoalerConfirm = (title, message, callback, options) => swoalerManager.confirm(title, message, callback, options);
window.swoalerConfirmWithActions = (title, message, actions, options) => swoalerManager.confirmWithActions(title, message, actions, options);
window.swoalerChoose = (title, message, choices, options) => swoalerManager.choose(title, message, choices, options);

// Verificar que swoaler esté disponible globalmente
if (typeof window.swoaler === 'undefined') {
    console.error('❌ Error: swoaler no se pudo inicializar correctamente');
} else {
    console.log('✅ Sistema de Swoaler cargado y disponible globalmente');
}

// Función de prueba para verificar que funciona
window.testSwoaler = function() {
    if (window.swoaler) {
        swoaler.success('¡Sistema funcionando!', 'Swoaler está listo para usar');
        return true;
    } else {
        console.error('❌ swoaler no está disponible');
        return false;
    }
};
