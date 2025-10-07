@extends('app.layouts.app')

@section('title', 'Notificaciones - Con Tu Voz App')
@section('page-title', '🔔 Notificaciones')
@section('page-subtitle', 'Mantente al día')

@section('content')
<div class="space-y-6">
    <!-- Configuración rápida -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold">Configuración Rápida</h3>
                <p class="text-blue-100">Personaliza tus notificaciones</p>
            </div>
            <div class="text-3xl">⚙️</div>
        </div>
        <div class="mt-4 grid grid-cols-2 gap-3">
            <button class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-4 py-2 text-sm font-medium">
                Activar Todas
            </button>
            <button class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-4 py-2 text-sm font-medium">
                Silenciar Todo
            </button>
        </div>
    </div>

    <!-- Notificaciones recientes -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📱 Recientes</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="text-green-600">🏆</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">¡Nuevo logro desbloqueado!</h4>
                        <p class="text-sm text-gray-600">Has completado 10 actividades. ¡Sigue así!</p>
                        <p class="text-xs text-gray-500 mt-1">Hace 2 horas</p>
                    </div>
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="text-blue-600">⏰</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Recordatorio de práctica</h4>
                        <p class="text-sm text-gray-600">Es hora de practicar. ¿Qué actividad harás hoy?</p>
                        <p class="text-xs text-gray-500 mt-1">Hace 4 horas</p>
                    </div>
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="text-purple-600">🎨</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Progreso en Pinta Letras</h4>
                        <p class="text-sm text-gray-600">¡Has completado la letra G! Continúa con la H.</p>
                        <p class="text-xs text-gray-500 mt-1">Ayer</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <span class="text-orange-600">📚</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Nuevo contenido disponible</h4>
                        <p class="text-sm text-gray-600">Se ha agregado nuevo contenido a la Biblioteca.</p>
                        <p class="text-xs text-gray-500 mt-1">2 días atrás</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tipos de notificaciones -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔧 Configuración</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">⏰</span>
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
                            <h4 class="font-medium text-gray-900">Logros y progreso</h4>
                            <p class="text-sm text-gray-600">Celebra tus avances</p>
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
                        <span class="text-2xl">📚</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Nuevo contenido</h4>
                            <p class="text-sm text-gray-600">Actualizaciones de la app</p>
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
                        <span class="text-2xl">💬</span>
                        <div>
                            <h4 class="font-medium text-gray-900">Mensajes del equipo</h4>
                            <p class="text-sm text-gray-600">Comunicaciones importantes</p>
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

    <!-- Horario de notificaciones -->
    <div class="bg-gray-50 rounded-xl p-4">
        <h4 class="font-medium text-gray-900 mb-3">⏰ Horario de Notificaciones</h4>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Horario de inicio</span>
                <select class="bg-white border border-gray-300 rounded-lg px-3 py-1 text-sm">
                    <option>08:00</option>
                    <option selected>09:00</option>
                    <option>10:00</option>
                    <option>11:00</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Horario de fin</span>
                <select class="bg-white border border-gray-300 rounded-lg px-3 py-1 text-sm">
                    <option>18:00</option>
                    <option selected>19:00</option>
                    <option>20:00</option>
                    <option>21:00</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Acciones -->
    <div class="space-y-3">
        <button class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl transition-colors">
            ✅ Marcar todas como leídas
        </button>

        <button class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-xl transition-colors">
            🗑️ Limpiar notificaciones
        </button>
    </div>
</div>
@endsection
