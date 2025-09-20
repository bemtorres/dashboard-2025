<div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-primary shadow-sm border-border-primary/20">
  <button type="button"
      class="px-4 border-r border-border-primary text-tertiary hover:text-primary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 lg:hidden transition-colors duration-200"
      id="sidebar-toggle">
      <span class="sr-only">Abrir sidebar</span>
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
  </button>

  <div class="flex-1 px-6 flex justify-between">
      <div class="flex-1 flex items-center">
          <h2 class="text-xl font-bold text-primary flex items-center">
              <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
              </svg>
              @yield('page-title', 'Dashboard')
          </h2>
      </div>

      <div class="ml-4 flex items-center space-x-4 md:ml-6">
          <!-- Botón de cambio de tema unificado -->
          <button
              type="button"
              id="theme-toggle"
              onclick="toggleTheme()"
              style="background-color: var(--primary-500);"
              onmouseover="this.style.backgroundColor='var(--primary-600)'"
              onmouseout="this.style.backgroundColor='var(--primary-500)'"
              title="Cambiar tema"
              class="relative inline-flex items-center justify-center rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 group w-8 h-8"
          >
              <span class="sr-only">Cambiar tema</span>
              <!-- Icono de sol (modo claro) -->
              <svg
                  class="w-4 h-4 group-hover:scale-105 transition-transform duration-200 theme-icon-light"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  style="display: block;"
              >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 3v1m0 16v1m9-9h1M3 12H2m15.325-4.325l.707-.707M3.968 3.968l-.707-.707m0 16.064l.707-.707m16.064 0l.707-.707M12 7a5 5 0 100 10 5 5 0 000-10z"
                  ></path>
              </svg>
              <!-- Icono de luna (modo oscuro) -->
              <svg
                  class="w-4 h-4 group-hover:scale-105 transition-transform duration-200 theme-icon-dark"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  style="display: none;"
              >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                  ></path>
              </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="ml-3 relative">
              <div>
                  <button type="button"
                      class="max-w-xs bg-primary flex items-center text-sm rounded-lg px-3 py-2 hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-primary-500 transition-colors duration-200 group"
                      id="user-menu-button">
                      <span class="sr-only">Abrir menú de usuario</span>
                      <div class="h-7 w-7 rounded-full bg-primary-600 flex items-center justify-center">
                          <span class="text-xs font-medium text-white">A</span>
                      </div>
                      <span class="ml-2 text-primary font-medium text-sm">Admin</span>
                      <svg class="ml-2 h-3 w-3 text-tertiary group-hover:text-primary-600 transition-colors duration-200" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"></path>
                      </svg>
                  </button>
              </div>

              <!-- Dropdown menu -->
              <div id="user-dropdown"
                  class="origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg py-1 bg-primary ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                  role="menu">
                  <a href="#"
                      class="flex items-center px-4 py-2 text-sm text-primary hover:bg-secondary transition-colors duration-200"
                      role="menuitem">
                      <svg class="w-4 h-4 mr-3 text-tertiary" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                          </path>
                      </svg>
                      Mi perfil
                  </a>

                  <a href="#"
                      class="flex items-center px-4 py-2 text-sm text-primary hover:bg-secondary transition-colors duration-200"
                      role="menuitem">
                      <svg class="w-4 h-4 mr-3 text-tertiary" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                          </path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      </svg>
                      Configuración
                  </a>

                  <div class="border-t border-border-primary/30 my-1"></div>

                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit"
                          class="flex items-center w-full text-left px-4 py-2 text-sm text-error-700 hover:bg-error-50 transition-colors duration-200"
                          role="menuitem">
                          <svg class="w-4 h-4 mr-3 text-error-400" fill="none" stroke="currentColor"
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
