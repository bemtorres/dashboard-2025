@extends('layouts.skeleton')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Gestión de Usuarios')
@section('page-title', 'Gestión de Usuarios')

@section('app')
<div class="space-y-6">
    <!-- Header con botones de acción -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-primary">Usuarios</h1>
            <p class="mt-1 text-sm text-secondary">Gestiona los usuarios de tu aplicación</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <x-button
                href="{{ route('admin.users.create') }}"
                variant="primary"
                size="sm"
                icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path>"
            >
                Agregar Usuario
            </x-button>
        </div>
    </div>

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
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gradient-to-r from-secondary to-tertiary/30">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-bold text-primary uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Usuario
                            </div>
                        </th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-primary uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email
                            </div>
                        </th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-primary uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                Rol
                            </div>
                        </th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-primary uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Estado
                            </div>
                        </th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-primary uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Fecha de registro
                            </div>
                        </th>
                        <th class="px-8 py-4 text-right text-xs font-bold text-primary uppercase tracking-wider">
                            <div class="flex items-center justify-end">
                                <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                                Acciones
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-primary">
                    @forelse($users as $user)
                    <tr class="group hover:bg-gradient-to-r hover:from-primary-50/50 hover:to-secondary-50/50 transition-all duration-300 border-b border-border-primary/20 last:border-b-0">
                        <td class="px-8 py-6 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-12 w-12 flex-shrink-0 relative">
                                    @if($user->photo)
                                        <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->full_name }}" class="h-12 w-12 rounded-full object-cover ring-2 ring-primary-200 group-hover:ring-primary-400 transition-all duration-300">
                                    @else
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center ring-2 ring-primary-200 group-hover:ring-primary-400 transition-all duration-300 shadow-lg">
                                            <span class="text-sm font-bold text-white">{{ $user->initials }}</span>
                                        </div>
                                    @endif
                                    <div class="absolute -bottom-1 -right-1 h-4 w-4 bg-success-500 rounded-full border-2 border-primary"></div>
                                </div>
                                <div class="ml-5">
                                    <div class="text-base font-bold text-primary group-hover:text-primary-700 transition-colors duration-300">{{ $user->full_name }}</div>
                                    <div class="text-sm text-secondary font-medium">ID: #{{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-primary group-hover:text-primary-700 transition-colors duration-300">{{ $user->email }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            @if($user->is_admin)
                                <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-full bg-gradient-to-r from-primary-100 to-primary-200 text-primary-800 shadow-sm ring-1 ring-primary-300">
                                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Administrador
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-full bg-gradient-to-r from-secondary-100 to-tertiary-100 text-secondary-800 shadow-sm ring-1 ring-secondary-300">
                                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Usuario
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-full bg-gradient-to-r from-success-100 to-success-200 text-success-800 shadow-sm ring-1 ring-success-300">
                                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Activo
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-full bg-gradient-to-r from-error-100 to-error-200 text-error-800 shadow-sm ring-1 ring-error-300">
                                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Inactivo
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-primary group-hover:text-primary-700 transition-colors duration-300">{{ $user->created_at->format('d M Y') }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap text-right text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex items-center justify-center w-7 h-7 rounded-md bg-secondary hover:bg-tertiary text-tertiary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary-500 transition-colors duration-200 group" id="user-menu-button-{{ $user->id }}" onclick="toggleUserMenu({{ $user->id }})">
                                    <span class="sr-only">Abrir menú de opciones</span>
                                    <svg class="w-4 h-4 group-hover:scale-105 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div class="absolute right-0 z-20 mt-2 w-48 origin-top-right rounded-lg bg-primary shadow-sm border border-border-primary-300 focus:outline-none hidden" id="user-menu-{{ $user->id }}" role="menu">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('admin.users.show', $user) }}" class="flex items-center px-4 py-2 text-sm text-primary hover:bg-secondary transition-colors duration-200" role="menuitem">
                                            <svg class="w-4 h-4 mr-3 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Ver detalles
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="flex items-center px-4 py-2 text-sm text-primary hover:bg-secondary transition-colors duration-200" role="menuitem">
                                            <svg class="w-4 h-4 mr-3 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Editar usuario
                                        </a>
                                        @if($user->id !== auth()->id())
                                        <div class="border-t border-border-primary/30 my-1"></div>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-error-700 hover:bg-error-50 transition-colors duration-200" role="menuitem">
                                                <svg class="w-4 h-4 mr-3 text-error-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Eliminar usuario
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-gradient-to-br from-primary-100 to-secondary-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-primary mb-2">No se encontraron usuarios</h3>
                                <p class="text-sm text-secondary mb-4">No hay usuarios que coincidan con los filtros aplicados</p>
                                <x-button
                                    href="{{ route('admin.users.create') }}"
                                    variant="primary"
                                    size="sm"
                                    icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path>"
                                >
                                    Agregar primer usuario
                                </x-button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if($users->hasPages())
        <div class="bg-primary px-4 py-3 flex items-center justify-between border-t border-border-primary sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                @if($users->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 border border-border-primary text-sm font-medium rounded-md text-tertiary bg-secondary cursor-not-allowed">
                        Anterior
                    </span>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-border-primary text-sm font-medium rounded-md text-primary bg-primary hover:bg-secondary transition-colors duration-200">
                        Anterior
                    </a>
                @endif

                @if($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-border-primary text-sm font-medium rounded-md text-primary bg-primary hover:bg-secondary transition-colors duration-200">
                        Siguiente
                    </a>
                @else
                    <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-border-primary text-sm font-medium rounded-md text-tertiary bg-secondary cursor-not-allowed">
                        Siguiente
                    </span>
                @endif
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-primary">
                        Mostrando
                        <span class="font-medium">{{ $users->firstItem() }}</span>
                        a
                        <span class="font-medium">{{ $users->lastItem() }}</span>
                        de
                        <span class="font-medium">{{ $users->total() }}</span>
                        resultados
                    </p>
                </div>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

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
