@extends('layouts.skeleton')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Gestión de Usuarios')
@section('page-title', 'Gestión de Usuarios')

@section('app')
<div class="space-y-6">
    <x-back title="Usuarios" description="Gestiona los usuarios de tu aplicación">
      <x-button
        onclick="openCreateUserModal()"
        variant="primary"
        size="sm"
        icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path>"
      >
        Agregar Usuario
      </x-button>
    </x-back>

    <!-- Filtros y búsqueda -->
    <div class="card">
        <div class="p-6">
            <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-primary mb-2">Buscar</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="search" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2.5 border border-border-primary rounded-lg text-sm placeholder-tertiary focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors duration-200 bg-primary hover:border-tertiary" placeholder="Buscar usuarios...">
                    </div>
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-primary mb-2">Rol</label>
                    <div class="relative">
                        <select id="role" name="role" class="block w-full px-3 py-2.5 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors duration-200 bg-primary hover:border-tertiary appearance-none cursor-pointer">
                            <option value="">Todos los roles</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>Usuario</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-4 w-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-primary mb-2">Estado</label>
                    <div class="relative">
                        <select id="status" name="status" class="block w-full px-3 py-2.5 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors duration-200 bg-primary hover:border-tertiary appearance-none cursor-pointer">
                            <option value="">Todos los estados</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Activo</option>
                            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-4 w-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex items-end">
                    <x-button
                        type="submit"
                        variant="outline"
                        size="sm"
                        icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z'></path>"
                        class="w-full"
                    >
                        Filtrar
                    </x-button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Tabla de usuarios -->
    <div class="card overflow-hidden shadow-xl border border-border-primary/20">
        <div class="px-6 py-6 sm:px-8 bg-gradient-to-r from-primary-50 to-secondary-50 border-b border-border-primary/10">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-primary flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Lista de Usuarios
                    </h3>
                    <p class="mt-2 text-sm text-secondary font-medium">{{ $users->total() }} usuarios registrados</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="px-3 py-1 bg-primary-100 text-primary-800 rounded-full text-xs font-semibold">
                        {{ $users->count() }} mostrados
                    </div>
                </div>
            </div>
        </div>
        @include('admin.users._table_users')
    </div>
</div>

<!-- Modal para crear usuario -->
@include('admin.users._modal_create_user')

<script>
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

// Cerrar menús al hacer clic fuera
document.addEventListener('click', function(event) {
    if (!event.target.closest('[id^="user-menu-button-"]') && !event.target.closest('[id^="user-menu-"]')) {
        document.querySelectorAll('[id^="user-menu-"]').forEach(menu => {
            if (!menu.classList.contains('hidden')) {
                menu.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
                menu.style.opacity = '0';
                menu.style.transform = 'scale(0.95)';

                setTimeout(() => {
                    menu.classList.add('hidden');
                    menu.style.transition = '';
                }, 75);
            }
        });
    }
});

// Cerrar menús con tecla Escape
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        document.querySelectorAll('[id^="user-menu-"]').forEach(menu => {
            if (!menu.classList.contains('hidden')) {
                menu.style.transition = 'opacity 75ms ease-in, transform 75ms ease-in';
                menu.style.opacity = '0';
                menu.style.transform = 'scale(0.95)';

                setTimeout(() => {
                    menu.classList.add('hidden');
                    menu.style.transition = '';
                }, 75);
            }
        });
    }
});

</script>
@endsection
