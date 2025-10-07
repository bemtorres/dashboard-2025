@extends('app.layouts.app')

@section('title', 'Mi Perfil - Con Tu Voz App')
@section('page-title', '👤 Mi Perfil')
@section('page-subtitle', 'Información personal')

@section('content')
<div class="space-y-6">
    <!-- Información del usuario -->
    <div class="bg-white rounded-2xl p-6 shadow-lg">
        <div class="text-center mb-6">
            <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center">
                <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}"
                     alt="Avatar" class="w-20 h-20 rounded-full">
            </div>
            <h2 class="text-xl font-bold text-gray-900">{{ $user->name ?? 'Usuario' }}</h2>
            <p class="text-gray-600">{{ $user->email ?? 'usuario@ejemplo.com' }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-green-600">15</div>
                <div class="text-sm text-gray-600">Actividades</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">7</div>
                <div class="text-sm text-gray-600">Días consecutivos</div>
            </div>
        </div>
    </div>

    <!-- Configuración de perfil -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">⚙️ Configuración</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🔔</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Notificaciones</h4>
                            <p class="text-sm text-gray-600">Recordatorios diarios</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🌙</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Modo Oscuro</h4>
                            <p class="text-sm text-gray-600">Tema de la aplicación</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas personales -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📊 Mis Estadísticas</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-purple-600">2.5h</div>
                <div class="text-sm text-gray-600">Tiempo total</div>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-orange-600">85%</div>
                <div class="text-sm text-gray-600">Precisión</div>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-green-600">12</div>
                <div class="text-sm text-gray-600">Logros</div>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-blue-600">A+</div>
                <div class="text-sm text-gray-600">Calificación</div>
            </div>
        </div>
    </div>
</div>
@endsection
