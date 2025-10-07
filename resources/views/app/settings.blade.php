@extends('app.layouts.app')

@section('title', 'Configuración - Con Tu Voz App')
@section('page-title', '⚙️ Configuración')
@section('page-subtitle', 'Personaliza tu experiencia')

@section('content')
<div class="space-y-6">
    <!-- Configuración de notificaciones -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔔 Notificaciones</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">📱</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Recordatorios diarios</h4>
                            <p class="text-sm text-gray-600">Notificaciones para practicar</p>
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
                        <span class="text-2xl">🏆</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Logros</h4>
                            <p class="text-sm text-gray-600">Notificaciones de progreso</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Configuración de apariencia -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🎨 Apariencia</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🌙</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Modo Oscuro</h4>
                            <p class="text-sm text-gray-600">Cambiar tema de la aplicación</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🔤</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Tamaño de texto</h4>
                            <p class="text-sm text-gray-600">Ajustar legibilidad</p>
                        </div>
                    </div>
                    <select class="bg-gray-100 border border-gray-300 rounded-lg px-3 py-1 text-sm">
                        <option>Pequeño</option>
                        <option selected>Mediano</option>
                        <option>Grande</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Configuración de audio -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔊 Audio</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🔊</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Efectos de sonido</h4>
                            <p class="text-sm text-gray-600">Sonidos de la aplicación</p>
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
                        <span class="text-2xl">🎵</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Música de fondo</h4>
                            <p class="text-sm text-gray-600">Música relajante</p>
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

    <!-- Configuración de privacidad -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔒 Privacidad</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">📊</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Análisis de uso</h4>
                            <p class="text-sm text-gray-600">Ayudar a mejorar la app</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Información de la cuenta -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">👤 Cuenta</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">📧</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Correo electrónico</h4>
                            <p class="text-sm text-gray-600">{{ $user->email ?? 'usuario@ejemplo.com' }}</p>
                        </div>
                    </div>
                    <button class="text-green-600 text-sm font-medium">Cambiar</button>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🔑</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Contraseña</h4>
                            <p class="text-sm text-gray-600">Última actualización: hace 30 días</p>
                        </div>
                    </div>
                    <button class="text-green-600 text-sm font-medium">Cambiar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones de cuenta -->
    <div class="space-y-3">
        <button class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-xl transition-colors">
            🗑️ Eliminar Cuenta
        </button>

        <button class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition-colors">
            📤 Exportar Datos
        </button>
    </div>
</div>
@endsection
