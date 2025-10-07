<!-- Componente para mostrar el estado de la PWA -->
<div id="pwa-status" class="fixed top-4 right-4 z-50 hidden">
    <!-- Indicador de estado offline -->
    <div id="offline-indicator" class="offline-indicator hidden">
        <span>📡 Sin conexión</span>
    </div>

    <!-- Indicador de sincronización -->
    <div id="sync-status" class="sync-status hidden">
        <span>🔄 Sincronizando...</span>
    </div>

    <!-- Notificación de actualización -->
    <div id="update-notification" class="install-prompt hidden">
        <div class="flex items-center space-x-3">
            <span>🔄</span>
            <div>
                <div class="font-bold">Nueva versión disponible</div>
                <div class="text-sm">Actualiza para obtener las últimas funciones</div>
            </div>
            <button onclick="updateApp()" class="bg-white text-green-600 px-3 py-1 rounded text-sm font-bold">
                Actualizar
            </button>
            <button onclick="closeUpdateNotification()" class="text-white text-sm">✕</button>
        </div>
    </div>
</div>

<script>
// Detectar estado de conexión
function updateOnlineStatus() {
    const offlineIndicator = document.getElementById('offline-indicator');
    const pwaStatus = document.getElementById('pwa-status');

    if (!navigator.onLine) {
        offlineIndicator.classList.remove('hidden');
        pwaStatus.classList.remove('hidden');
    } else {
        offlineIndicator.classList.add('hidden');
        if (document.getElementById('sync-status').classList.contains('hidden')) {
            pwaStatus.classList.add('hidden');
        }
    }
}

// Mostrar estado de sincronización
function showSyncStatus(message, type = 'default') {
    const syncStatus = document.getElementById('sync-status');
    const pwaStatus = document.getElementById('pwa-status');

    syncStatus.innerHTML = `<span>${message}</span>`;
    syncStatus.className = `sync-status ${type}`;
    syncStatus.classList.remove('hidden');
    pwaStatus.classList.remove('hidden');

    // Ocultar después de 3 segundos si es un mensaje de éxito
    if (type === 'default') {
        setTimeout(() => {
            syncStatus.classList.add('hidden');
            if (document.getElementById('offline-indicator').classList.contains('hidden')) {
                pwaStatus.classList.add('hidden');
            }
        }, 3000);
    }
}

// Mostrar notificación de actualización
function showUpdateNotification() {
    const updateNotification = document.getElementById('update-notification');
    const pwaStatus = document.getElementById('pwa-status');

    updateNotification.classList.remove('hidden');
    pwaStatus.classList.remove('hidden');
}

// Cerrar notificación de actualización
function closeUpdateNotification() {
    const updateNotification = document.getElementById('update-notification');
    const pwaStatus = document.getElementById('pwa-status');

    updateNotification.classList.add('hidden');
    if (document.getElementById('offline-indicator').classList.contains('hidden') &&
        document.getElementById('sync-status').classList.contains('hidden')) {
        pwaStatus.classList.add('hidden');
    }
}

// Actualizar aplicación
function updateApp() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.getRegistration().then(registration => {
            if (registration && registration.waiting) {
                registration.waiting.postMessage({ action: 'skipWaiting' });
                window.location.reload();
            }
        });
    }
}

// Event listeners
window.addEventListener('online', updateOnlineStatus);
window.addEventListener('offline', updateOnlineStatus);
window.addEventListener('load', updateOnlineStatus);

// Mostrar estado inicial
updateOnlineStatus();
</script>
