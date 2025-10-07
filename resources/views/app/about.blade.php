@extends('app.layouts.app')

@section('title', 'Acerca de - Con Tu Voz App')
@section('page-title', 'ℹ️ Acerca de')
@section('page-subtitle', 'Información de la aplicación')

@section('content')
<div class="space-y-6">
    <!-- Información de la app -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white text-center">
        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
            <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}"
                 alt="Logo" class="w-16 h-16 rounded-full">
        </div>
        <h2 class="text-2xl font-bold mb-2">Con Tu Voz App</h2>
        <p class="text-green-100 mb-4">Versión 1.0.0</p>
        <p class="text-sm text-green-100">
            Una aplicación móvil diseñada para el aprendizaje interactivo y la práctica de habilidades comunicativas.
        </p>
    </div>

    <!-- Características principales -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">✨ Características</h3>
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="text-blue-600 text-xl">🎨</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Pinta Letras</h4>
                        <p class="text-sm text-gray-600">Aprende dibujando letras paso a paso</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="text-green-600 text-xl">🗣️</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Hablemos</h4>
                        <p class="text-sm text-gray-600">Practica pronunciación con ejercicios</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="text-purple-600 text-xl">🤝</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Comunícate</h4>
                        <p class="text-sm text-gray-600">Mejora tus habilidades de conversación</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <span class="text-orange-600 text-xl">📚</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900">Biblioteca</h4>
                        <p class="text-sm text-gray-600">Recursos educativos y materiales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información técnica -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔧 Información Técnica</h3>
        <div class="bg-gray-50 rounded-xl p-4">
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Versión:</span>
                    <span class="font-medium">1.0.0</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Última actualización:</span>
                    <span class="font-medium">{{ date('d/m/Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tamaño:</span>
                    <span class="font-medium">~15 MB</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Plataforma:</span>
                    <span class="font-medium">PWA (Progressive Web App)</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Compatibilidad:</span>
                    <span class="font-medium">iOS 12+, Android 8+</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Equipo de desarrollo -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">👥 Equipo de Desarrollo</h3>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="text-center">
                <h4 class="font-medium text-gray-900 mb-2">Con Tu Voz Team</h4>
                <p class="text-sm text-gray-600 mb-4">
                    Desarrolladores comprometidos con la educación y el aprendizaje interactivo.
                </p>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Desarrollo:</span>
                        <span class="font-medium">Con Tu Voz Team</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Diseño:</span>
                        <span class="font-medium">UX/UI Team</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Contenido:</span>
                        <span class="font-medium">Educadores</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Licencias y términos -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📄 Legal</h3>
        <div class="space-y-3">
            <a href="#" class="block bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:bg-gray-50 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="text-gray-900">Términos de Servicio</span>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </a>

            <a href="#" class="block bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:bg-gray-50 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="text-gray-900">Política de Privacidad</span>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </a>

            <a href="#" class="block bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:bg-gray-50 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="text-gray-900">Licencias de Terceros</span>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>

    <!-- Contacto -->
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
        <div class="flex items-start space-x-3">
            <div class="text-2xl">💌</div>
            <div>
                <h4 class="font-medium text-gray-900 mb-1">¿Tienes comentarios?</h4>
                <p class="text-sm text-gray-700 mb-3">
                    Nos encantaría escuchar tus sugerencias para mejorar la app.
                </p>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    Enviar Feedback
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
