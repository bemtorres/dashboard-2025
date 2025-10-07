const CACHE_NAME = 'ctv-pwa-v1';
const urlsToCache = [
    '/',
    '/webapp',
    '/webapp/menu',
    '/manifest.json',
    '/favicon.ico',
    '/common/assets/webapp/img/gecko cara.png',
    'https://cdn.tailwindcss.com'
];

// Instalación del Service Worker
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('Cache abierto');
                return cache.addAll(urlsToCache);
            })
            .catch(error => {
                console.error('Error al cachear recursos:', error);
            })
    );
});

// Activación del Service Worker
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME) {
                        console.log('Eliminando cache antiguo:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Interceptar requests
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Cache hit - devolver respuesta del cache
                if (response) {
                    return response;
                }

                // Clonar el request
                const fetchRequest = event.request.clone();

                return fetch(fetchRequest).then(response => {
                    // Verificar si recibimos una respuesta válida
                    if (!response || response.status !== 200 || response.type !== 'basic') {
                        return response;
                    }

                    // Clonar la respuesta
                    const responseToCache = response.clone();

                    caches.open(CACHE_NAME)
                        .then(cache => {
                            cache.put(event.request, responseToCache);
                        });

                    return response;
                }).catch(error => {
                    console.error('Error en fetch:', error);

                    // Si es una página HTML, mostrar página offline
                    if (event.request.destination === 'document') {
                        return caches.match('/offline.html');
                    }
                });
            })
    );
});

// Manejar notificaciones push
self.addEventListener('push', event => {
    const options = {
        body: event.data ? event.data.text() : 'Nueva notificación de Con Tu Voz',
        icon: '/common/assets/webapp/img/gecko cara.png',
        badge: '/common/assets/webapp/img/gecko cara.png',
        vibrate: [200, 100, 200],
        data: {
            dateOfArrival: Date.now(),
            primaryKey: 1
        },
        actions: [
            {
                action: 'explore',
                title: 'Ver contenido',
                icon: '/common/assets/webapp/img/gecko cara.png'
            },
            {
                action: 'close',
                title: 'Cerrar',
                icon: '/common/assets/webapp/img/gecko cara.png'
            }
        ]
    };

    event.waitUntil(
        self.registration.showNotification('Con Tu Voz', options)
    );
});

// Manejar clics en notificaciones
self.addEventListener('notificationclick', event => {
    event.notification.close();

    if (event.action === 'explore') {
        event.waitUntil(
            clients.openWindow('/webapp/menu')
        );
    }
});

// Sincronización en segundo plano
self.addEventListener('sync', event => {
    if (event.tag === 'background-sync') {
        event.waitUntil(
            // Aquí puedes agregar lógica para sincronizar datos
            console.log('Sincronización en segundo plano ejecutada')
        );
    }
});
