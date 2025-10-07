<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#34d399">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Con Tu Voz App">
    <title>@yield('title', 'Iniciar Sesión - Con Tu Voz App')</title>

    <!-- PWA Manifest -->
    <link rel="manifest" href="/manifest.json">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="/common/assets/webapp/img/gecko cara.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/common/assets/webapp/img/gecko cara.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/common/assets/webapp/img/gecko cara.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Estilos PWA -->
    {{-- <link rel="stylesheet" href="/css/pwa-styles.css"> --}}

    <!-- Estilos específicos del login -->
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
        }

        </style>
        @yield('styles')

    <!-- Meta tags adicionales -->
    @yield('meta')
</head>
<body class="@yield('body-class', 'bg-gradient-to-br from-green-400 via-green-500 to-green-600 min-h-screen')">
    @yield('content')

    <!-- Scripts -->
    @yield('scripts')

    <!-- Scripts básicos del login -->
    <script>
        // Prevenir zoom en inputs
        document.addEventListener('touchstart', function (event) {
            if (event.touches.length > 1) {
                event.preventDefault();
            }
        });

        let lastTouchEnd = 0;
        document.addEventListener('touchend', function (event) {
            const now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
                event.preventDefault();
            }
            lastTouchEnd = now;
        }, false);
    </script>
</body>
</html>
