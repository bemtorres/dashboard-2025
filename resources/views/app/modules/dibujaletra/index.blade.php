@extends('app.layouts.app')

@section('title', 'Pinta Letras - Con Tu Voz App')
@section('page-title', '🎨 Pinta Letras')
@section('page-subtitle', 'Aprende dibujando letras')

@section('styles')
<style>
    .letter-card {
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #ffffff, #f8fafc);
    }

    .letter-card:active {
        transform: scale(0.95);
    }

    .letter-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .letter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 1rem;
    }

    .letter-item {
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 1rem;
        font-weight: bold;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .letter-item.completed {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .letter-item.in-progress {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
    }

    .letter-item.locked {
        background: #e5e7eb;
        color: #9ca3af;
        cursor: not-allowed;
    }

    .progress-section {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
        border-radius: 1rem;
        padding: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Progreso general -->
    <div class="progress-section">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">📊 Tu Progreso</h3>
            <span class="text-2xl font-bold text-blue-600">7/26</span>
        </div>
        <div class="flex items-center space-x-3">
            <div class="flex-1 bg-gray-200 rounded-full h-3">
                <div class="bg-gradient-to-r from-blue-500 to-green-500 h-3 rounded-full"
                     style="width: 27%"></div>
            </div>
            <span class="text-sm font-medium text-gray-600">27%</span>
        </div>
        <p class="text-sm text-gray-600 mt-2">
            ¡Sigue así! Has completado 7 letras del alfabeto.
        </p>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
            <div class="text-2xl font-bold text-green-600">7</div>
            <div class="text-xs text-gray-600">Completadas</div>
        </div>
        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
            <div class="text-2xl font-bold text-blue-600">1</div>
            <div class="text-xs text-gray-600">En Progreso</div>
        </div>
        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
            <div class="text-2xl font-bold text-gray-400">18</div>
            <div class="text-xs text-gray-600">Pendientes</div>
        </div>
    </div>

    <!-- Alfabeto -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🔤 Alfabeto</h3>
        <div class="letter-grid">
            @php
                $letters = range('A', 'Z');
                $completed = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
                $inProgress = ['H'];
            @endphp

            @foreach($letters as $index => $letter)
                @php
                    $status = 'locked';
                    $route = '#';

                    if (in_array($letter, $completed)) {
                        $status = 'completed';
                        $route = route('app.module.dibujaletra.letter', strtolower($letter));
                    } elseif (in_array($letter, $inProgress)) {
                        $status = 'in-progress';
                        $route = route('app.module.dibujaletra.letter', strtolower($letter));
                    } elseif ($index <= count($completed) + count($inProgress)) {
                        $status = 'available';
                        $route = route('app.module.dibujaletra.letter', strtolower($letter));
                    }
                @endphp

                <a href="{{ $route }}"
                   class="letter-item {{ $status }} {{ $status === 'locked' ? 'pointer-events-none' : '' }}">
                    @if($status === 'completed')
                        ✓
                    @elseif($status === 'in-progress')
                        ⏳
                    @elseif($status === 'available')
                        {{ $letter }}
                    @else
                        🔒
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    <!-- Letra destacada del día -->
    <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl p-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="text-4xl">🎯</div>
            <div class="flex-1">
                <h3 class="text-lg font-bold">Letra del Día</h3>
                <p class="text-sm opacity-90">Practica la letra H hoy</p>
            </div>
            <a href="{{ route('app.module.dibujaletra.letter', 'h') }}"
               class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-4 py-2 font-medium">
                Practicar
            </a>
        </div>
    </div>

    <!-- Actividad reciente -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🕒 Actividad Reciente</h3>
        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-green-600 font-bold">G</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Letra G</h4>
                            <p class="text-sm text-gray-600">Completado hace 1 hora</p>
                        </div>
                    </div>
                    <div class="text-green-600">✓</div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-blue-600 font-bold">H</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Letra H</h4>
                            <p class="text-sm text-gray-600">En progreso - 60%</p>
                        </div>
                    </div>
                    <div class="text-blue-600">⏳</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tips y consejos -->
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
        <div class="flex items-start space-x-3">
            <div class="text-2xl">💡</div>
            <div>
                <h4 class="font-medium text-gray-900 mb-1">Tip del Día</h4>
                <p class="text-sm text-gray-700">
                    Practica cada letra al menos 3 veces para mejorar tu técnica de dibujo.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animación de las letras
    document.addEventListener('DOMContentLoaded', function() {
        const letterItems = document.querySelectorAll('.letter-item');

        letterItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.05}s`;
            item.classList.add('fade-in');
        });
    });

    // Efecto de hover mejorado
    document.querySelectorAll('.letter-item:not(.locked)').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.05)';
        });

        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>
@endsection
