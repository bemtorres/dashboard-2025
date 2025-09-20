<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Administración') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
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


<script>
  // Función global para cambiar tema
  function toggleTheme() {
      const currentTheme = document.documentElement.getAttribute('data-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

      console.log('🔄 Cambiando tema de', currentTheme, 'a', newTheme);

      // Actualizar tema
      document.documentElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);

      // Actualizar iconos de todos los botones
      updateAllThemeIcons(newTheme);

      // Actualizar información del tema (si existe)
      updateThemeInfo();

      // Mostrar notificación
      showThemeNotification(newTheme);
  }

  // Función para actualizar iconos de todos los botones de tema
  function updateAllThemeIcons(currentTheme) {
      const themeToggleSelectors = [
          'theme-toggle',        // Componente theme-toggle
          'theme-toggle-nav',    // Botón en navegación
          'test-toggle'          // Botón de prueba en settings
      ];

      themeToggleSelectors.forEach(selector => {
          const button = document.getElementById(selector);
          if (button) {
              const lightIcon = button.querySelector('.theme-icon-light');
              const darkIcon = button.querySelector('.theme-icon-dark');

              if (lightIcon && darkIcon) {
                  if (currentTheme === 'dark') {
                      lightIcon.style.display = 'none';
                      darkIcon.style.display = 'block';
                      button.title = 'Cambiar a modo claro';
                  } else {
                      lightIcon.style.display = 'block';
                      darkIcon.style.display = 'none';
                      button.title = 'Cambiar a modo oscuro';
                  }
                  console.log(`✅ Botón ${selector} actualizado para tema: ${currentTheme}`);
              }
          }
      });
  }

  // Función para mostrar notificación de cambio de tema
  function showThemeNotification(theme) {
      const notification = document.createElement('div');
      notification.className = 'theme-notification';
      notification.textContent = `Modo ${theme === 'dark' ? 'oscuro' : 'claro'} activado`;
      notification.style.cssText = `
          position: fixed;
          top: 80px;
          right: 20px;
          z-index: 1000;
          padding: 12px 20px;
          background: var(--primary-600, #3b82f6);
          color: white;
          border-radius: 8px;
          font-size: 14px;
          font-weight: 500;
          box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
          transform: translateX(100%);
          transition: transform 0.3s ease;
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

  // Función para actualizar la información del tema (solo para la página de settings)
  function updateThemeInfo() {
      const currentTheme = document.documentElement.getAttribute('data-theme');
      const bodyStyles = window.getComputedStyle(document.body);

      // Solo actualizar si los elementos existen (página de settings)
      const currentThemeEl = document.getElementById('current-theme');
      const bodyBgEl = document.getElementById('body-bg');
      const textColorEl = document.getElementById('text-color');

      if (currentThemeEl) currentThemeEl.textContent = currentTheme;
      if (bodyBgEl) bodyBgEl.textContent = bodyStyles.backgroundColor;
      if (textColorEl) textColorEl.textContent = bodyStyles.color;
  }

  // Sistema de toast ahora está en toast.js

  // Hacer la función toggleTheme disponible globalmente
  window.toggleTheme = toggleTheme;

  // Actualizar información al cargar
  document.addEventListener('DOMContentLoaded', function() {
      // Obtener tema actual
      const currentTheme = document.documentElement.getAttribute('data-theme');

      // Actualizar iconos inicialmente
      updateAllThemeIcons(currentTheme);

      // Actualizar información del tema
      updateThemeInfo();

      // Escuchar cambios de tema para actualizar la información
      const themeObserver = new MutationObserver(function(mutations) {
          mutations.forEach(function(mutation) {
              if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                  const newTheme = document.documentElement.getAttribute('data-theme');
                  updateAllThemeIcons(newTheme);
                  updateThemeInfo();
              }
          });
      });

      // Iniciar observación
      themeObserver.observe(document.documentElement, {
          attributes: true,
          attributeFilter: ['data-theme']
      });

      console.log('🎨 Sistema de temas inicializado correctamente');
  });

      // Pruebas de toast (descomenta para probar)
      // toast.success('Usuario creado exitosamente')
      // toast.warning('Revisa los datos antes de continuar')
      // toast.error('No se pudo conectar al servidor')
      // toast.info('Información guardada', 2000)
</script>

<!-- Sistema de Toast - Cargar al final para asegurar disponibilidad -->
<script src="{{ asset('common/toast.js') }}"></script>

<!-- Sistema de Swoaler - Modales con iconos grandes -->
<script src="{{ asset('common/alertnow.js') }}"></script>
@stack('js')
</body>
</html>
