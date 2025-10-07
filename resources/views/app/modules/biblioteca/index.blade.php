@extends('app.layouts.app')

@section('title', 'Biblioteca - Con Tu Voz App')
@section('page-title', '📚 Biblioteca')
@section('page-subtitle', 'Recursos educativos')

@section('content')
<div class="space-y-6">
    <!-- Progreso del módulo -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-bold">Tu Biblioteca</h3>
                <p class="text-orange-100">5 de 15 recursos explorados</p>
            </div>
            <div class="text-3xl font-bold">33%</div>
        </div>
        <div class="bg-white bg-opacity-20 rounded-full h-3">
            <div class="bg-white rounded-full h-3" style="width: 33%"></div>
        </div>
    </div>

    <!-- Categorías de recursos -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📖 Categorías</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-2">📚</div>
                <h4 class="font-medium text-gray-900">Libros</h4>
                <p class="text-sm text-gray-600">8 disponibles</p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-2">🎵</div>
                <h4 class="font-medium text-gray-900">Audios</h4>
                <p class="text-sm text-gray-600">12 disponibles</p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-2">🎬</div>
                <h4 class="font-medium text-gray-900">Videos</h4>
                <p class="text-sm text-gray-600">5 disponibles</p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-2">📝</div>
                <h4 class="font-medium text-gray-900">Ejercicios</h4>
                <p class="text-sm text-gray-600">10 disponibles</p>
            </div>
        </div>
    </div>

    <!-- Recursos destacados -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">⭐ Recursos Destacados</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="text-blue-600 text-xl">📚</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Abecedario Interactivo</h4>
                        <p class="text-sm text-gray-600">Aprende el alfabeto paso a paso</p>
                    </div>
                    <button class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm">
                        Abrir
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="text-green-600 text-xl">🎵</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Canciones Educativas</h4>
                        <p class="text-sm text-gray-600">Aprende cantando</p>
                    </div>
                    <button class="bg-green-500 text-white px-3 py-1 rounded-lg text-sm">
                        Reproducir
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="text-purple-600 text-xl">🎬</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Cuentos Animados</h4>
                        <p class="text-sm text-gray-600">Historias para aprender</p>
                    </div>
                    <button class="bg-purple-500 text-white px-3 py-1 rounded-lg text-sm">
                        Ver
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Búsqueda -->
    <div class="bg-gray-50 rounded-xl p-4">
        <h4 class="font-medium text-gray-900 mb-3">🔍 Buscar Recursos</h4>
        <div class="flex space-x-2">
            <input type="text"
                   placeholder="Buscar en la biblioteca..."
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">
                Buscar
            </button>
        </div>
    </div>
</div>
@endsection
