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

    <!-- Theme Toggle Script - Simplificado -->
    <script>
        console.log('Script de tema cargado');

        // Función global simple para cambiar tema
        function toggleTheme() {
            console.log('toggleTheme() llamada');

            const currentTheme = document.documentElement.getAttribute('data-theme');
            console.log('Tema actual:', currentTheme);

            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            console.log('Nuevo tema:', newTheme);

            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            console.log('Tema cambiado a:', newTheme);
            console.log('Atributo data-theme actual:', document.documentElement.getAttribute('data-theme'));
        }

        // Hacer la función global
        window.toggleTheme = toggleTheme;

        console.log('Función toggleTheme disponible globalmente');

        // Debug: Verificar que el tema se aplica correctamente
        setTimeout(() => {
            console.log('Debug - Tema actual del documento:', document.documentElement.getAttribute('data-theme'));
            console.log('Debug - Clases del body:', document.body.className);
        }, 1000);

        // Función de prueba para debug
        function testTheme() {
            console.log('=== PRUEBA DE TEMA ===');
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

            setTimeout(() => {
                console.log('Después del cambio:');
                console.log('Tema actual:', document.documentElement.getAttribute('data-theme'));
                console.log('Estilos computados del body:', window.getComputedStyle(document.body).backgroundColor);
            }, 100);
        }

        window.testTheme = testTheme;
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-secondary">
    <div class="min-h-screen bg-secondary">
        @include('layouts._sidebar')

        <div class="fixed inset-0 z-40 bg-primary bg-opacity-75 lg:hidden hidden" id="sidebar-overlay"></div>

        <!-- Main content -->
      <div class="lg:pl-64 flex flex-col flex-1 bg-secondary">
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
