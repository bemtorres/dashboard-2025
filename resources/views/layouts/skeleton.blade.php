<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Administración') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Theme Script - Must be before CSS to prevent FOUC -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <!-- Theme Toggle Script - Mejorado -->
    <script>
        console.log('🎨 Sistema de temas cargado');

        // Función global para cambiar tema
        function toggleTheme() {
            console.log('🔄 Cambiando tema...');

            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            console.log(`📱 Tema actual: ${currentTheme} → Nuevo tema: ${newTheme}`);

            // Cambiar el atributo data-theme
            document.documentElement.setAttribute('data-theme', newTheme);

            // Guardar en localStorage
            localStorage.setItem('theme', newTheme);

            // Forzar repaint
            document.body.style.display = 'none';
            document.body.offsetHeight; // Trigger reflow
            document.body.style.display = '';

            console.log('✅ Tema cambiado exitosamente');

            // Actualizar iconos si existen
            updateThemeIcons();
            updateUnifiedThemeIcons();
        }

        // Función para actualizar iconos de tema (genérica)
        function updateThemeIcons() {
            // Esta función ahora es genérica, el componente theme-toggle maneja sus propios iconos
            console.log('🎯 Actualizando iconos de tema (genérico)');
        }

        // Hacer las funciones globales
        window.toggleTheme = toggleTheme;
        window.updateThemeIcons = updateThemeIcons;

        // Inicializar iconos cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🚀 DOM cargado, inicializando tema');
            updateThemeIcons();
            updateUnifiedThemeIcons();
        });

        // Función de debug
        function debugTheme() {
            console.log('🔍 === DEBUG DE TEMA ===');
            console.log('Tema actual:', document.documentElement.getAttribute('data-theme'));
            console.log('Tema guardado:', localStorage.getItem('theme'));
            console.log('Fondo del body:', window.getComputedStyle(document.body).backgroundColor);
            console.log('Color del texto:', window.getComputedStyle(document.body).color);
        }

        // Función de prueba (compatibilidad con botón test)
        function testTheme() {
            console.log('🧪 === PRUEBA DE TEMA ===');
            console.log('Tema actual:', document.documentElement.getAttribute('data-theme'));
            console.log('Clases del body:', document.body.className);
            console.log('Estilos computados del body:', window.getComputedStyle(document.body).backgroundColor);
            console.log('Estilos computados del html:', window.getComputedStyle(document.documentElement).backgroundColor);

            // Forzar cambio de tema
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            console.log('Cambiando a tema:', newTheme);
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            // Actualizar iconos del botón unificado
            updateUnifiedThemeIcons();

            setTimeout(() => {
                console.log('Después del cambio:');
                console.log('Tema actual:', document.documentElement.getAttribute('data-theme'));
                console.log('Estilos computados del body:', window.getComputedStyle(document.body).backgroundColor);
            }, 100);
        }

        // Función para actualizar iconos del botón unificado
        function updateUnifiedThemeIcons() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const lightIcon = document.querySelector('#theme-toggle .theme-icon-light');
            const darkIcon = document.querySelector('#theme-toggle .theme-icon-dark');
            const button = document.querySelector('#theme-toggle');

            console.log('🔍 Actualizando iconos unificados...', {
                lightIcon: !!lightIcon,
                darkIcon: !!darkIcon,
                button: !!button,
                currentTheme
            });

            if (lightIcon && darkIcon && button) {
                if (currentTheme === 'dark') {
                    lightIcon.style.display = 'none';
                    darkIcon.style.display = 'block';
                    button.title = 'Cambiar a modo claro';
                    console.log('🌙 Mostrando icono de luna - Título: Cambiar a modo claro');
                } else {
                    lightIcon.style.display = 'block';
                    darkIcon.style.display = 'none';
                    button.title = 'Cambiar a modo oscuro';
                    console.log('☀️ Mostrando icono de sol - Título: Cambiar a modo oscuro');
                }
                console.log('✅ Iconos del botón unificado actualizados correctamente');
            } else {
                console.log('❌ Elementos del botón unificado no encontrados:', {
                    lightIcon: !!lightIcon,
                    darkIcon: !!darkIcon,
                    button: !!button
                });

                // Reintentar después de un breve delay
                setTimeout(() => {
                    console.log('🔄 Reintentando actualización de iconos...');
                    updateUnifiedThemeIcons();
                }, 100);
            }
        }

        window.debugTheme = debugTheme;
        window.testTheme = testTheme;

        console.log('✅ Sistema de temas inicializado');
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-secondary">
    <div class="min-h-screen bg-secondary">
        @include('layouts._sidebar')

        <div class="fixed inset-0 z-40 bg-primary bg-opacity-75 lg:hidden hidden" id="sidebar-overlay"></div>

        <!-- Main content -->
      <div class="lg:pl-56 flex flex-col flex-1 bg-secondary">
        @include('layouts._nav')
        <main class="flex-1 bg-secondary">
          <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
              @if (session('success'))
                  <div class="mb-4 bg-success-100 border border-success-400 text-success-700 px-4 py-3 rounded relative"
                      role="alert">
                      <span class="block sm:inline">{{ session('success') }}</span>
                  </div>
              @endif

              @if (session('error'))
                  <div class="mb-4 bg-error-100 border border-error-400 text-error-700 px-4 py-3 rounded relative"
                      role="alert">
                      <span class="block sm:inline">{{ session('error') }}</span>
                  </div>
              @endif

              @yield('app')
            </div>
          </div>
        </main>
      </div>
    </div>


    <!-- Sidebar toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const closeSidebar = document.getElementById('close-sidebar');
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');

            // Sidebar functions
            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            }

            function closeSidebarMobile() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }

            // User dropdown functions
            function toggleUserDropdown() {
                const isHidden = userDropdown.classList.contains('hidden');

                if (isHidden) {
                    // Show dropdown with animation
                    userDropdown.classList.remove('hidden');
                    userDropdown.style.opacity = '0';
                    userDropdown.style.transform = 'scale(0.95)';

                    // Force reflow
                    userDropdown.offsetHeight;

                    // Add transition classes
                    userDropdown.style.transition = 'opacity 100ms ease-out, transform 100ms ease-out';
                    userDropdown.style.opacity = '1';
                    userDropdown.style.transform = 'scale(1)';
                } else {
                    // Hide dropdown with animation
                    userDropdown.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
                    userDropdown.style.opacity = '0';
                    userDropdown.style.transform = 'scale(0.95)';

                    setTimeout(() => {
                        userDropdown.classList.add('hidden');
                        userDropdown.style.transition = '';
                    }, 75);
                }
            }

            function closeUserDropdown() {
                if (!userDropdown.classList.contains('hidden')) {
                    userDropdown.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
                    userDropdown.style.opacity = '0';
                    userDropdown.style.transform = 'scale(0.95)';

                    setTimeout(() => {
                        userDropdown.classList.add('hidden');
                        userDropdown.style.transition = '';
                    }, 75);
                }
            }

            // Event listeners
            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', closeSidebarMobile);
            closeSidebar.addEventListener('click', closeSidebarMobile);

            // User dropdown events
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleUserDropdown();
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                    closeUserDropdown();
                }
            });

            // Close dropdown on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeUserDropdown();
                }
            });
        });
    </script>
</body>

</html>
