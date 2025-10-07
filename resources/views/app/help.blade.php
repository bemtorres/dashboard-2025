@extends('app.layouts.app')

@section('title', 'Ayuda - Con Tu Voz App')
@section('page-title', '❓ Ayuda')
@section('page-subtitle', 'Soporte y guías')

@section('content')
<div class="space-y-6">
    <!-- Preguntas frecuentes -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">❓ Preguntas Frecuentes</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <h4 class="font-medium text-gray-900 mb-2">¿Cómo empiezo a usar la app?</h4>
                <p class="text-sm text-gray-600">
                    Simplemente ve al Dashboard y selecciona una actividad. Te recomendamos empezar con "Pinta Letras" para familiarizarte con la interfaz.
                </p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <h4 class="font-medium text-gray-900 mb-2">¿Puedo usar la app sin internet?</h4>
                <p class="text-sm text-gray-600">
                    Sí, la app funciona offline. Los contenidos se descargan automáticamente cuando tienes conexión.
                </p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <h4 class="font-medium text-gray-900 mb-2">¿Cómo veo mi progreso?</h4>
                <p class="text-sm text-gray-600">
                    Ve a la sección "Mi Progreso" desde el menú inferior para ver estadísticas detalladas de tu aprendizaje.
                </p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <h4 class="font-medium text-gray-900 mb-2">¿Puedo instalar la app en mi dispositivo?</h4>
                <p class="text-sm text-gray-600">
                    Sí, es una PWA. Busca el botón "Instalar App" o usa la opción "Agregar a pantalla de inicio" en tu navegador.
                </p>
            </div>
        </div>
    </div>

    <!-- Guías de uso -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📖 Guías de Uso</h3>
        <div class="space-y-3">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-4 text-white">
                <div class="flex items-center space-x-3">
                    <span class="text-2xl">🎨</span>
                    <div>
                        <h4 class="font-bold">Pinta Letras</h4>
                        <p class="text-blue-100 text-sm">Aprende a dibujar letras paso a paso</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-4 text-white">
                <div class="flex items-center space-x-3">
                    <span class="text-2xl">🗣️</span>
                    <div>
                        <h4 class="font-bold">Hablemos</h4>
                        <p class="text-green-100 text-sm">Practica pronunciación con ejercicios</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-4 text-white">
                <div class="flex items-center space-x-3">
                    <span class="text-2xl">🤝</span>
                    <div>
                        <h4 class="font-bold">Comunícate</h4>
                        <p class="text-purple-100 text-sm">Mejora tus habilidades de conversación</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacto -->
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
        <div class="flex items-start space-x-3">
            <div class="text-2xl">📞</div>
            <div>
                <h4 class="font-medium text-gray-900 mb-1">¿Necesitas más ayuda?</h4>
                <p class="text-sm text-gray-700 mb-3">
                    Si no encuentras lo que buscas, contáctanos directamente.
                </p>
                <div class="space-y-2">
                    <a href="mailto:soporte@contuvoz.com"
                       class="block bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-medium text-center">
                        📧 Enviar Email
                    </a>
                    <a href="tel:+1234567890"
                       class="block bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-medium text-center">
                        📞 Llamar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Información de la app -->
    <div class="bg-gray-50 rounded-xl p-4">
        <h4 class="font-medium text-gray-900 mb-3">ℹ️ Información de la App</h4>
        <div class="space-y-2 text-sm text-gray-600">
            <div class="flex justify-between">
                <span>Versión:</span>
                <span class="font-medium">1.0.0</span>
            </div>
            <div class="flex justify-between">
                <span>Última actualización:</span>
                <span class="font-medium">Hoy</span>
            </div>
            <div class="flex justify-between">
                <span>Desarrollador:</span>
                <span class="font-medium">Con Tu Voz Team</span>
            </div>
        </div>
    </div>
</div>
@endsection
