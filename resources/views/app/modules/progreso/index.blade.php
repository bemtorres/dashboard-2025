@extends('app.layouts.app')

@section('title', 'Mi Progreso - Con Tu Voz App')
@section('page-title', '📊 Mi Progreso')
@section('page-subtitle', 'Seguimiento de tu aprendizaje')

@section('styles')
<style>
    .progress-card {
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        transition: all 0.3s ease;
    }

    .progress-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .circular-progress {
        position: relative;
        width: 120px;
        height: 120px;
    }

    .circular-progress svg {
        transform: rotate(-90deg);
    }

    .circular-progress .progress-ring {
        transition: stroke-dashoffset 0.5s ease-in-out;
    }

    .achievement-badge {
        transition: all 0.3s ease;
    }

    .achievement-badge:hover {
        transform: scale(1.05);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }

    .module-progress {
        background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.7));
        backdrop-filter: blur(10px);
    }
</style>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Resumen general -->
    <div class="progress-card rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900">📈 Resumen General</h3>
                <p class="text-gray-600">Tu progreso en Con Tu Voz</p>
            </div>
            <div class="circular-progress">
                <svg width="120" height="120">
                    <circle cx="60" cy="60" r="50"
                            stroke="#e5e7eb"
                            stroke-width="8"
                            fill="transparent"/>
                    <circle cx="60" cy="60" r="50"
                            stroke="url(#gradient)"
                            stroke-width="8"
                            fill="transparent"
                            stroke-dasharray="314"
                            stroke-dashoffset="94.2"
                            class="progress-ring"/>
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#10b981"/>
                            <stop offset="100%" style="stop-color:#3b82f6"/>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-2xl font-bold text-gray-900">70%</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="text-center">
                <div class="text-3xl font-bold text-green-600">15</div>
                <div class="text-sm text-gray-600">Actividades</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600">2.5h</div>
                <div class="text-sm text-gray-600">Tiempo total</div>
            </div>
        </div>
    </div>

    <!-- Estadísticas por módulo -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📚 Progreso por Módulo</h3>
        <div class="space-y-4">
            <!-- Pinta Letras -->
            <div class="module-progress rounded-xl p-4 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-blue-600 text-xl">🎨</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Pinta Letras</h4>
                            <p class="text-sm text-gray-600">7/26 letras completadas</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-blue-600">27%</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 27%"></div>
                    </div>
                    <a href="{{ route('app.module.dibujaletra') }}" class="text-blue-600 text-sm font-medium">
                        Continuar →
                    </a>
                </div>
            </div>

            <!-- Hablemos -->
            <div class="module-progress rounded-xl p-4 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-green-600 text-xl">🗣️</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Hablemos</h4>
                            <p class="text-sm text-gray-600">3/10 lecciones completadas</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-green-600">30%</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 30%"></div>
                    </div>
                    <a href="{{ route('app.module.hablemos') }}" class="text-green-600 text-sm font-medium">
                        Continuar →
                    </a>
                </div>
            </div>

            <!-- Comunícate -->
            <div class="module-progress rounded-xl p-4 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-purple-600 text-xl">🤝</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Comunícate</h4>
                            <p class="text-sm text-gray-600">2/8 diálogos completados</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-purple-600">25%</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 25%"></div>
                    </div>
                    <a href="{{ route('app.module.comunicate') }}" class="text-purple-600 text-sm font-medium">
                        Continuar →
                    </a>
                </div>
            </div>

            <!-- Biblioteca -->
            <div class="module-progress rounded-xl p-4 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <span class="text-orange-600 text-xl">📚</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Biblioteca</h4>
                            <p class="text-sm text-gray-600">5/15 recursos explorados</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-orange-600">33%</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: 33%"></div>
                    </div>
                    <a href="{{ route('app.module.biblioteca') }}" class="text-orange-600 text-sm font-medium">
                        Explorar →
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas detalladas -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📊 Estadísticas Detalladas</h3>
        <div class="stats-grid">
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-blue-600">7</div>
                <div class="text-sm text-gray-600">Días consecutivos</div>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-green-600">45min</div>
                <div class="text-sm text-gray-600">Tiempo promedio</div>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-purple-600">12</div>
                <div class="text-sm text-gray-600">Logros desbloqueados</div>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm text-center">
                <div class="text-2xl font-bold text-orange-600">A+</div>
                <div class="text-sm text-gray-600">Calificación promedio</div>
            </div>
        </div>
    </div>

    <!-- Logros recientes -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🏆 Logros Recientes</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="achievement-badge bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl p-4 text-white text-center">
                <div class="text-3xl mb-2">🥇</div>
                <div class="text-sm font-bold">Primer Paso</div>
                <div class="text-xs opacity-90">Completa tu primera actividad</div>
            </div>

            <div class="achievement-badge bg-gradient-to-r from-green-400 to-green-500 rounded-xl p-4 text-white text-center">
                <div class="text-3xl mb-2">📚</div>
                <div class="text-sm font-bold">Estudiante</div>
                <div class="text-xs opacity-90">5 actividades completadas</div>
            </div>

            <div class="achievement-badge bg-gradient-to-r from-blue-400 to-blue-500 rounded-xl p-4 text-white text-center">
                <div class="text-3xl mb-2">⏰</div>
                <div class="text-sm font-bold">Constante</div>
                <div class="text-xs opacity-90">7 días consecutivos</div>
            </div>

            <div class="achievement-badge bg-gradient-to-r from-purple-400 to-purple-500 rounded-xl p-4 text-white text-center">
                <div class="text-3xl mb-2">🎯</div>
                <div class="text-sm font-bold">Preciso</div>
                <div class="text-xs opacity-90">90% de precisión</div>
            </div>
        </div>
    </div>

    <!-- Historial de actividad -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📅 Historial de Actividad</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-green-600">🎨</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Pinta Letras - Letra G</h4>
                            <p class="text-sm text-gray-600">Hoy, 2:30 PM</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-bold text-green-600">100%</div>
                        <div class="text-xs text-gray-500">15min</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-blue-600">🗣️</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Hablemos - Pronunciación</h4>
                            <p class="text-sm text-gray-600">Ayer, 6:15 PM</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-bold text-blue-600">85%</div>
                        <div class="text-xs text-gray-500">20min</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-purple-600">🤝</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Comunícate - Diálogo 2</h4>
                            <p class="text-sm text-gray-600">2 días atrás</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-bold text-purple-600">92%</div>
                        <div class="text-xs text-gray-500">25min</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Objetivos semanales -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-6 text-white">
        <h3 class="text-lg font-bold mb-4">🎯 Objetivos de esta Semana</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-sm">Completar 5 actividades</span>
                <span class="text-sm font-bold">3/5</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Practicar 30 minutos diarios</span>
                <span class="text-sm font-bold">5/7 días</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Alcanzar 80% de precisión</span>
                <span class="text-sm font-bold">85% ✓</span>
            </div>
        </div>
        <div class="mt-4 bg-white bg-opacity-20 rounded-lg p-3">
            <div class="text-sm font-bold mb-2">Progreso semanal: 75%</div>
            <div class="bg-white bg-opacity-30 rounded-full h-2">
                <div class="bg-white rounded-full h-2" style="width: 75%"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animación del progreso circular
    document.addEventListener('DOMContentLoaded', function() {
        const progressRing = document.querySelector('.progress-ring');
        if (progressRing) {
            const progress = 70; // Porcentaje de progreso
            const circumference = 2 * Math.PI * 50; // r = 50
            const offset = circumference - (progress / 100) * circumference;
            progressRing.style.strokeDashoffset = offset;
        }
    });

    // Animaciones suaves para las tarjetas
    const cards = document.querySelectorAll('.progress-card, .module-progress, .achievement-badge');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('fade-in');
    });
</script>
@endsection
