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

    {{-- Contenido principal --}}
    <div class="space-y-6">
        {{-- Grid de tarjetas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Tarjeta 1: Comunicación Básica --}}
            <div class="card hover:shadow-lg transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-2">
                          <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                          </svg>
                          <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-success-100 text-success-800">
                              Publicado
                          </span>

                        </div>
                        <button class="text-tertiary hover:text-primary transition-colors duration-200 p-1 rounded-md hover:bg-secondary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>

                    <h3 class="text-lg font-semibold text-primary mb-2">Comunicación Básica</h3>
                    <p class="text-sm text-secondary mb-4">Fundamentos de la comunicación para niños con discapacidad auditiva</p>

                    <div class="text-sm text-tertiary mb-4">0 contenidos</div>

                    <div class="flex items-center justify-between text-xs text-secondary">
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>18 ene 2024</span>
                        </div>
                        <div>por Dr. Ana García</div>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 2: Señas Básicas --}}
            <div class="card hover:shadow-lg transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-2">
                          <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                          </svg>
                          <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-success-100 text-success-800">
                            Publicado
                          </span>
                        </div>
                        <button class="text-tertiary hover:text-primary transition-colors duration-200 p-1 rounded-md hover:bg-secondary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>

                    <h3 class="text-lg font-semibold text-primary mb-2">Señas Básicas</h3>
                    <p class="text-sm text-secondary mb-4">Introducción al lenguaje de señas</p>

                    <div class="text-sm text-tertiary mb-4">0 contenidos</div>

                    <div class="flex items-center justify-between text-xs text-secondary">
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>19 ene 2024</span>
                        </div>
                        <div>por Dr. Ana García</div>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 3: Ejercicios de Coordinación --}}
            <div class="card hover:shadow-lg transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-2">
                          <svg class="w-4 h-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                          </svg>
                          <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                            Borrador
                          </span>
                        </div>
                        <button class="text-tertiary hover:text-primary transition-colors duration-200 p-1 rounded-md hover:bg-secondary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>

                    <h3 class="text-lg font-semibold text-primary mb-2">Ejercicios de Coordinación</h3>
                    <p class="text-sm text-secondary mb-4">Actividades para mejorar la motricidad fina</p>

                    <div class="text-sm text-tertiary mb-4">0 contenidos</div>

                    <div class="flex items-center justify-between text-xs text-secondary">
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>3 feb 2024</span>
                        </div>
                        <div>por Dr. Ana García</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('extra')
{{-- @include('admin.users._modal_create_user') --}}
@endpush
@push('js')

@endpush
