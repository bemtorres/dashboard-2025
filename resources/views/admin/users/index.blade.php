@extends('layouts.skeleton')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Gestión de Usuarios')
@section('page-title', 'Gestión de Usuarios')

@section('app')
<div class="space-y-6">
    <x-back title="Usuarios" description="Gestiona los usuarios de tu aplicación">
      <button
        type="button"
        onclick="openCreateUserModal()"
        class="btn-primary inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-200 disabled:cursor-not-allowed shadow-lg hover:shadow-xl px-3 py-1.5 text-sm"
      >
        Agregar Usuario
      </button>
    </x-back>

    <!-- Filtros y búsqueda -->
    <div class="">
        <div class="p-2">
            <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-2">
                <div>
                    {{-- <label for="search" class="block text-sm font-medium text-primary mb-2">Buscar</label> --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="search" name="search" value="{{ request('search') }}" class="input w-full pl-10 pr-3 py-2.5 text-sm placeholder-tertiary focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors duration-200" placeholder="Buscar usuarios...">
                    </div>
                </div>
                <div>
                    <x-select
                        name="role"
                        placeholder="Todos los roles"
                        :options="[
                            'admin' => 'Administrador',
                            'user' => 'Usuario'
                        ]"
                        :value="request('role')"
                        wrapperClass="mb-0"
                    />
                </div>
                <div>
                    <x-select
                        name="status"
                        placeholder="Todos los estados"
                        :options="[
                            'active' => 'Activo',
                            'inactive' => 'Inactivo'
                        ]"
                        :value="request('status')"
                        wrapperClass="mb-0"
                    />
                </div>
                <div class="flex items-center">
                  <x-button class="btn-primary" type="submit" variant="primary" size="sm">
                    Filtrar
                  </x-button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="card overflow-hidden shadow-xl border border-border-primary/20 rounded-2xl">
      @include('admin.users._table_simple')
    </div>
</div>
@endsection
@push('extra')
@include('admin.users._modal_create_user')
@endpush
@push('js')
<script>
  // Función para abrir el modal de crear usuario
  function openCreateUserModal() {
      console.log('Intentando abrir modal...');
      const modal = document.getElementById('createUserModal');
      console.log('Modal encontrado:', modal);

      if (modal) {
          modal.classList.remove('hidden');
          modal.classList.add('flex');
          document.body.style.overflow = 'hidden';
          console.log('Modal abierto correctamente');

          // Enfocar el primer input
          setTimeout(() => {
              const firstInput = modal.querySelector('input');
              if (firstInput) {
                  firstInput.focus();
              }
          }, 100);
      } else {
          console.error('Modal no encontrado con ID: createUserModal');
      }
  }

  // Función para cerrar el modal de crear usuario
  function closeCreateUserModal() {
      console.log('Cerrando modal...');
      const modal = document.getElementById('createUserModal');
      if (modal) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
          document.body.style.overflow = 'auto';

          // Limpiar el formulario
          const form = document.getElementById('createUserForm');
          if (form) {
              form.reset();
          }
      }
  }

  function toggleUserMenu(userId) {
      const menu = document.getElementById(`user-menu-${userId}`);
      const isHidden = menu.classList.contains('hidden');

      // Cerrar todos los otros menús abiertos
      document.querySelectorAll('[id^="user-menu-"]').forEach(otherMenu => {
          if (otherMenu.id !== `user-menu-${userId}`) {
              otherMenu.classList.add('hidden');
          }
      });

      if (isHidden) {
          // Mostrar menú con animación
          menu.classList.remove('hidden');
          menu.style.opacity = '0';
          menu.style.transform = 'scale(0.95)';

          // Force reflow
          menu.offsetHeight;

          // Añadir transición
          menu.style.transition = 'opacity 100ms ease-out, transform 100ms ease-out';
          menu.style.opacity = '1';
          menu.style.transform = 'scale(1)';
      } else {
          // Ocultar menú con animación
          menu.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
          menu.style.opacity = '0';
          menu.style.transform = 'scale(0.95)';

          setTimeout(() => {
              menu.classList.add('hidden');
              menu.style.transition = '';
          }, 75);
      }
  }

  // Inicializar cuando el DOM esté listo
  document.addEventListener('DOMContentLoaded', function() {
      console.log('DOM cargado, inicializando funciones del modal...');

      // Cerrar modal al hacer clic fuera
      document.addEventListener('click', function(e) {
          const modal = document.getElementById('createUserModal');
          if (e.target === modal) {
              closeCreateUserModal();
          }
      });

      // Cerrar modal con tecla Escape
      document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') {
              const modal = document.getElementById('createUserModal');
              if (modal && !modal.classList.contains('hidden')) {
                  closeCreateUserModal();
              }
          }
      });

      // Validación del formulario
      const form = document.getElementById('createUserForm');
      if (form) {
          form.addEventListener('submit', function(e) {
              const password = document.getElementById('password').value;

              if (password.length < 8) {
                  e.preventDefault();
                  alert('La contraseña debe tener al menos 8 caracteres');
                  return false;
              }
          });
      }

      // Verificar que el modal existe
      const modal = document.getElementById('createUserModal');
      if (modal) {
          console.log('Modal encontrado en DOM:', modal);
      } else {
          console.error('Modal no encontrado en DOM');
      }
  });
  </script>
@endpush
