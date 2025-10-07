<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#34d399">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Con Tu Voz App">
    <meta name="mobile-web-app-capable" content="yes">
    <title>@yield('title', 'Con Tu Voz App')</title>

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
    <link rel="stylesheet" href="/css/pwa-styles.css">

    <!-- Estilos específicos de la app móvil -->
    <style>

        /* Estilos específicos para app móvil */
        body {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: none;
        }

        .mobile-container {
            max-height: 100vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            z-index: 50;
        }

        .top-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            z-index: 50;
            min-height: 48px;
        }

        @media (min-width: 640px) {
            .top-nav {
                min-height: 56px;
            }
        }

        .content-with-nav {
            padding-top: 56px;
            padding-bottom: 80px;
            min-height: 100vh;
        }

        @media (min-width: 640px) {
            .content-with-nav {
                padding-top: 64px;
            }
        }

        .mobile-card {
            transition: all 0.2s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .mobile-card:active {
            transform: scale(0.98);
        }

        /* Animaciones suaves */
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Estilos para modo standalone */
        @media (display-mode: standalone) {
            .content-with-nav {
                padding-top: 80px;
            }

            .top-nav {
                padding-top: env(safe-area-inset-top);
            }

            .bottom-nav {
                padding-bottom: env(safe-area-inset-bottom);
            }
        }

        /* Estilos para pantallas pequeñas */
        @media (max-width: 640px) {
            .mobile-container {
                padding: 0 0.75rem;
            }

            .top-nav {
                min-height: 44px;
            }

            .content-with-nav {
                padding-top: 52px;
            }
        }

        /* Estilos para pantallas muy pequeñas */
        @media (max-width: 375px) {
            .mobile-container {
                padding: 0 0.5rem;
            }

            .top-nav {
                min-height: 40px;
            }

            .content-with-nav {
                padding-top: 48px;
            }
        }
    </style>
    @yield('styles')

    <!-- Meta tags adicionales -->
    @yield('meta')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Top Navigation -->
    @if(!isset($hideTopNav) || !$hideTopNav)
    <nav class="top-nav">
        <div class="flex items-center justify-between px-3 py-2 sm:px-4 sm:py-3">
            <!-- Left side - Back button and title -->
            <div class="flex items-center space-x-2 sm:space-x-3 min-w-0 flex-1">
                @if(!isset($hideBackButton) || !$hideBackButton)
                <button onclick="history.back()" class="flex-shrink-0 p-1.5 sm:p-2 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                @endif
                <div class="min-w-0 flex-1">
                    <h1 class="text-base sm:text-lg font-semibold text-gray-900 truncate">@yield('page-title', 'Con Tu Voz')</h1>
                    @hasSection('page-subtitle')
                    <p class="text-xs sm:text-sm text-gray-500 truncate">@yield('page-subtitle')</p>
                    @endif
                </div>
            </div>

            <!-- Right side - User menu -->
            <div class="flex items-center space-x-1 sm:space-x-2 flex-shrink-0">
                @auth
                <div class="relative">
                    <button onclick="toggleUserMenu()" class="flex items-center space-x-1 sm:space-x-2 p-1.5 sm:p-2 rounded-full hover:bg-gray-100 transition-colors">
                        <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}"
                             alt="Avatar" class="w-6 h-6 sm:w-8 sm:h-8 rounded-full">
                    </button>

                    <!-- User Menu Dropdown -->
                    <div id="userMenu" class="hidden absolute right-0 top-full mt-2 w-44 sm:w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                        <a href="{{ route('app.profile') }}" class="block px-3 sm:px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            👤 Mi Perfil
                        </a>
                        <a href="{{ route('app.settings') }}" class="block px-3 sm:px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            ⚙️ Configuración
                        </a>
                        <a href="{{ route('app.notifications') }}" class="block px-3 sm:px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            🔔 Notificaciones
                        </a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('app.logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 sm:px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                🚪 Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Login button for guests -->
                <a href="{{ route('app.login') }}" class="flex items-center space-x-1 p-1.5 sm:p-2 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="hidden sm:inline text-sm font-medium">Entrar</span>
                </a>
                @endauth
            </div>
        </div>
    </nav>
    @endif

    <!-- Main Content -->
    <main class="content-with-nav mobile-container">
        <div class="fade-in">
            @yield('content')
        </div>
    </main>

    <!-- Bottom Navigation -->
    @if(!isset($hideBottomNav) || !$hideBottomNav)
    <nav class="bottom-nav">
        <div class="flex items-center justify-around py-2">
            <a href="{{ route('app.dashboard') }}"
               class="flex flex-col items-center space-y-1 p-2 rounded-lg {{ request()->routeIs('app.dashboard') ? 'text-green-600' : 'text-gray-500' }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
                <span class="text-xs font-medium">Inicio</span>
            </a>

            <a href="{{ route('app.module.dibujaletra') }}"
               class="flex flex-col items-center space-y-1 p-2 rounded-lg {{ request()->routeIs('app.module.dibujaletra*') ? 'text-blue-600' : 'text-gray-500' }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <span class="text-xs font-medium">Actividades</span>
            </a>

            <a href="{{ route('app.module.progreso') }}"
               class="flex flex-col items-center space-y-1 p-2 rounded-lg {{ request()->routeIs('app.module.progreso*') ? 'text-red-600' : 'text-gray-500' }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                <span class="text-xs font-medium">Progreso</span>
            </a>

            <a href="{{ route('app.help') }}"
               class="flex flex-col items-center space-y-1 p-2 rounded-lg {{ request()->routeIs('app.help*') ? 'text-purple-600' : 'text-gray-500' }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                </svg>
                <span class="text-xs font-medium">Ayuda</span>
            </a>
        </div>
    </nav>
    @endif

    <!-- Componente de estado PWA -->
    @include('components.pwa-status')

    <!-- Scripts -->
    @yield('scripts')

    <!-- Scripts de la app móvil -->
    <script>
        // Toggle user menu
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            menu.classList.toggle('hidden');
        }

        // Cerrar menú al hacer clic fuera
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('userMenu');
            const button = event.target.closest('button');

            if (menu && !menu.contains(event.target) && button !== event.target) {
                menu.classList.add('hidden');
            }
        });

        // PWA Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('SW registrado exitosamente:', registration.scope);
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
