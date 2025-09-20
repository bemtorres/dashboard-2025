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
          <div class="mt-4">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 md:px-8">
              @yield('app')
            </div>
          </div>
        </main>
      </div>
    </div>


<script src="{{ asset('common/toast.js') }}"></script>
<script src="{{ asset('common/alertnow.js') }}"></script>
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
    if (newTheme === 'dark') {
      toast.black(null, null, 'Modo oscuro activado', { duration: 3000 });
    } else {
      toast.success('Modo claro activado');
    }
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeInfo();
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

      if (currentTheme === 'dark') {
        document.getElementById('theme-icon-light').classList.add('hidden');
        document.getElementById('theme-icon-dark').classList.remove('hidden');
      } else {
        document.getElementById('theme-icon-light').classList.remove('hidden');
        document.getElementById('theme-icon-dark').classList.add('hidden');
      }
  }

  // Sistema de toast ahora está en toast.js

  // Hacer la función toggleTheme disponible globalmente
  window.toggleTheme = toggleTheme;

  // Actualizar información al cargar
  document.addEventListener('DOMContentLoaded', function() {
      updateThemeInfo();
      const themeObserver = new MutationObserver(function(mutations) {
          mutations.forEach(function(mutation) {
              if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                  const newTheme = document.documentElement.getAttribute('data-theme');
                  updateThemeInfo();
              }
          });
      });

      themeObserver.observe(document.documentElement, {
          attributes: true,
          attributeFilter: ['data-theme']
      });
  });

      // Pruebas de toast (descomenta para probar)
      // toast.success('Usuario creado exitosamente')
      // toast.warning('Revisa los datos antes de continuar')
      // toast.error('No se pudo conectar al servidor')
      // toast.info('Información guardada', 2000)
</script>
@stack('js')


</body>
</html>
