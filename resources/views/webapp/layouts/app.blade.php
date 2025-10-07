<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#34d399">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Con Tu Voz">
    <meta name="msapplication-TileColor" content="#34d399">
    <meta name="msapplication-config" content="/browserconfig.xml">
    <title>@yield('title', 'Con Tu Voz')</title>

    <!-- PWA Manifest -->
    <link rel="manifest" href="/manifest.json">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="/common/assets/webapp/img/gecko cara.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/common/assets/webapp/img/gecko cara.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/common/assets/webapp/img/gecko cara.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/common/assets/webapp/img/gecko cara.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Estilos PWA -->
    <link rel="stylesheet" href="/css/pwa-styles.css">

    <style>
        @yield('styles')
    </style>

    <!-- Meta tags adicionales -->
    @yield('meta')
</head>
<body class="@yield('body-class', 'bg-green-100 font-sans')">
    @yield('content')

    <!-- Componente de estado PWA -->
    @include('components.pwa-status')

    <!-- Scripts -->
    @yield('scripts')

    <!-- PWA Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('SW registrado exitosamente:', registration.scope);

                        // Verificar actualizaciones
                        registration.addEventListener('updatefound', () => {
                            const newWorker = registration.installing;
                            newWorker.addEventListener('statechange', () => {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    // Nueva versión disponible
                                    if (confirm('Hay una nueva versión disponible. ¿Deseas actualizar?')) {
                                        newWorker.postMessage({ action: 'skipWaiting' });
                                        window.location.reload();
                                    }
                                }
                            });
                        });
                    })
                    .catch(error => {
                        console.log('Error al registrar SW:', error);
                    });
            });
        }

        // Manejar instalación de PWA
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;

            // Mostrar botón de instalación personalizado
            const installBtn = document.getElementById('install-btn');
            if (installBtn) {
                installBtn.style.display = 'block';
                installBtn.addEventListener('click', () => {
                    deferredPrompt.prompt();
                    deferredPrompt.userChoice.then((choiceResult) => {
                        if (choiceResult.outcome === 'accepted') {
                            console.log('Usuario aceptó la instalación');
                        }
                        deferredPrompt = null;
                    });
                });
            }
        });

        // Manejar instalación completada
        window.addEventListener('appinstalled', (evt) => {
            console.log('PWA instalada exitosamente');
        });
    </script>
</body>
</html>
