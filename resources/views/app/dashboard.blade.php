@extends('app.layouts.app')

@section('title', 'Dashboard - Con Tu Voz App')
@section('page-title', 'Dashboard')
@section('page-subtitle', '¡Bienvenido de vuelta!')
@section('hideTopNav', true)

@section('styles')
<style>
    .module-card {
        transition: all 0.3s ease;
        transform-origin: center;
    }

    .module-card:active {
        transform: scale(0.95);
    }

    .module-card:hover {
        transform: translateY(-2px);
    }

    .progress-ring {
        transform: rotate(-90deg);
    }

    .progress-ring-circle {
        transition: stroke-dashoffset 0.5s ease-in-out;
    }

    .stats-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.7));
        backdrop-filter: blur(10px);
    }

    /* Ajustes para pantalla completa sin top nav */
    .fullscreen-content {
        padding-top: 1rem;
        min-height: 100vh;
    }

    /* Mejoras para móvil */
    @media (max-width: 640px) {
        .module-card {
            padding: 1rem;
        }

        .stats-card {
            padding: 0.75rem;
        }

        .space-y-6 > * + * {
            margin-top: 1rem;
        }

        .fullscreen-content {
            padding-top: 0.75rem;
        }
    }

    /* Mejoras para pantallas muy pequeñas */
    @media (max-width: 375px) {
        .module-card {
            padding: 0.75rem;
        }

        .stats-card {
            padding: 0.5rem;
        }

        .fullscreen-content {
            padding-top: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="fullscreen-content space-y-6">
    <!-- Header simple integrado -->
    <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}"
                     alt="Logo" class="w-10 h-10 rounded-full">
                <div>
                    <h1 class="text-lg font-bold text-gray-900">Con Tu Voz</h1>
                    <p class="text-sm text-gray-600">App de aprendizaje</p>
                </div>
            </div>
            @auth
            <div class="flex items-center space-x-2">
                <a href="{{ route('app.profile') }}" class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
                <form method="POST" action="{{ route('app.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="p-2 rounded-full hover:bg-gray-100 transition-colors text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>
            @else
            <a href="{{ route('app.login') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                Iniciar Sesión
            </a>
            @endauth
        </div>
    </div>

    <!-- Saludo personalizado -->
    <div class="stats-card rounded-2xl p-4 sm:p-6 shadow-lg">
        <div class="flex items-center space-x-3 sm:space-x-4">
            <div class="flex-shrink-0">
                <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}"
                     alt="Avatar" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full">
            </div>
            <div class="flex-1 min-w-0">
                <h2 class="text-lg sm:text-xl font-bold text-gray-900 truncate">
                    ¡Hola, {{ isset($user) && $user ? ($user->name ?? 'Usuario') : 'Usuario' }}! 👋
                </h2>
                <p class="text-sm sm:text-base text-gray-600">¿Qué actividad te gustaría hacer hoy?</p>
            </div>
            <div class="text-right flex-shrink-0">
                <div class="text-xl sm:text-2xl font-bold text-green-600">85%</div>
                <div class="text-xs sm:text-sm text-gray-500">Progreso</div>
            </div>
        </div>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="grid grid-cols-2 gap-3 sm:gap-4">
        <div class="stats-card rounded-xl p-3 sm:p-4 text-center">
            <div class="text-xl sm:text-2xl font-bold text-blue-600">{{ rand(5, 15) }}</div>
            <div class="text-xs sm:text-sm text-gray-600">Actividades</div>
            <div class="text-xs text-green-600">+2 esta semana</div>
        </div>
        <div class="stats-card rounded-xl p-3 sm:p-4 text-center">
            <div class="text-xl sm:text-2xl font-bold text-green-600">{{ rand(20, 50) }}min</div>
            <div class="text-xs sm:text-sm text-gray-600">Tiempo hoy</div>
            <div class="text-xs text-blue-600">+10min ayer</div>
        </div>
    </div>

    <!-- Módulos principales -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🎯 Actividades</h3>
        <div class="grid grid-cols-1 gap-3 sm:gap-4">
            @if(isset($modules) && is_array($modules))
                @foreach($modules as $key => $module)
                <a href="{{ route($module['route']) }}"
                   class="module-card block bg-white rounded-2xl p-4 sm:p-6 shadow-lg border border-gray-100">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <div class="flex-shrink-0">
                            <div class="{{ $module['color'] }} w-12 h-12 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center">
                                <img src="{{ asset($module['icon']) }}"
                                     alt="{{ $module['title'] }}"
                                     class="w-8 h-8 sm:w-10 sm:h-10 object-contain">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-1 truncate">
                                {{ $module['title'] }}
                            </h4>
                            <p class="text-gray-600 text-xs sm:text-sm">{{ $module['description'] }}</p>
                            <div class="flex items-center mt-2 space-x-2">
                                <div class="flex-1 bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full"
                                         style="width: {{ rand(60, 90) }}%"></div>
                                </div>
                                <span class="text-xs text-gray-500">{{ rand(60, 90) }}%</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                @endforeach
            @else
                <!-- Fallback si no hay módulos disponibles -->
                <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg border border-gray-100 text-center">
                    <div class="text-4xl mb-4">🎯</div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Actividades</h4>
                    <p class="text-gray-600 text-sm">Las actividades estarán disponibles próximamente</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Actividad reciente -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📚 Actividad Reciente</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="text-blue-600">🎨</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Pinta Letras - Letra A</h4>
                        <p class="text-sm text-gray-600">Completado hace 2 horas</p>
                    </div>
                    <div class="text-green-600 text-sm font-medium">✓</div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="text-green-600">🗣️</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Hablemos - Pronunciación</h4>
                        <p class="text-sm text-gray-600">En progreso</p>
                    </div>
                    <div class="text-blue-600 text-sm font-medium">⏳</div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="text-purple-600">🤝</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">Comunícate - Diálogos</h4>
                        <p class="text-sm text-gray-600">Completado ayer</p>
                    </div>
                    <div class="text-green-600 text-sm font-medium">✓</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">⚡ Acciones Rápidas</h3>
        <div class="grid grid-cols-2 gap-3">
            <a href="{{ route('app.module.dibujaletra') }}"
               class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-3 sm:p-4 text-center transition-transform hover:scale-105">
                <div class="text-xl sm:text-2xl mb-2">🎨</div>
                <div class="text-xs sm:text-sm font-medium">Empezar a Dibujar</div>
            </a>

            <a href="{{ route('app.module.progreso') }}"
               class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-3 sm:p-4 text-center transition-transform hover:scale-105">
                <div class="text-xl sm:text-2xl mb-2">📊</div>
                <div class="text-xs sm:text-sm font-medium">Ver Progreso</div>
            </a>
        </div>
    </div>

    <!-- Botón de instalación PWA (si está disponible) -->
    <button id="install-btn"
            class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all duration-300 hidden"
            style="display: none;">
        📱 Instalar App
    </button>
</div>
@endsection

@section('scripts')
<script>
    // Animaciones suaves para las tarjetas
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.module-card, .stats-card');

        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('fade-in');
        });
    });

    // Actualizar estadísticas en tiempo real (simulado)
    setInterval(() => {
        const timeElement = document.querySelector('.stats-card .text-2xl');
        if (timeElement && timeElement.textContent.includes('min')) {
            const currentTime = parseInt(timeElement.textContent);
            timeElement.textContent = `${currentTime + 1}min`;
        }
    }, 60000); // Actualizar cada minuto
</script>
@endsection
