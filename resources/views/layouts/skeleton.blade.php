<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Administración') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        @include('layouts._sidebar')

        <div class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden hidden" id="sidebar-overlay"></div>

        <!-- Main content -->
      <div class="lg:pl-64 flex flex-col flex-1">
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
              <button type="button"
                  class="px-4 border-r border-gray-200 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 lg:hidden transition-colors duration-200"
                  id="sidebar-toggle">
                  <span class="sr-only">Abrir sidebar</span>
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                  </svg>
              </button>

              <div class="flex-1 px-4 flex justify-between">
                  <div class="flex-1 flex items-center">
                      <h2 class="text-lg font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h2>
                  </div>

                  <div class="ml-4 flex items-center md:ml-6">
                      <!-- Profile dropdown -->
                      <div class="ml-3 relative">
                          <div>
                              <button type="button"
                                  class="max-w-xs bg-white flex items-center text-sm rounded-lg px-3 py-2 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-200"
                                  id="user-menu-button">
                                  <span class="sr-only">Abrir menú de usuario</span>
                                  <div class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center">
                                      <span class="text-sm font-medium text-white">A</span>
                                  </div>
                                  <span class="ml-2 text-gray-700 font-medium">Admin</span>
                                  <svg class="ml-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                      viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                  </svg>
                              </button>
                          </div>

                          <!-- Dropdown menu -->
                          <div id="user-dropdown"
                              class="origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-200 hidden"
                              role="menu">
                              <a href="#"
                                  class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200"
                                  role="menuitem">
                                  <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                      viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                      </path>
                                  </svg>
                                  Tu perfil
                              </a>
                              <a href="#"
                                  class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200"
                                  role="menuitem">
                                  <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                      viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                      </path>
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                  </svg>
                                  Configuración
                              </a>
                              <div class="border-t border-gray-100 my-1"></div>
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <button type="submit"
                                      class="flex items-center w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200"
                                      role="menuitem">
                                      <svg class="w-4 h-4 mr-3 text-red-400" fill="none" stroke="currentColor"
                                          viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                          </path>
                                      </svg>
                                      Cerrar sesión
                                  </button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
        <main class="flex-1">
          <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
              @if (session('success'))
                  <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                      role="alert">
                      <span class="block sm:inline">{{ session('success') }}</span>
                  </div>
              @endif

              @if (session('error'))
                  <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
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
