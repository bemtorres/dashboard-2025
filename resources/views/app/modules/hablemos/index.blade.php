@extends('app.layouts.app')

@section('title', 'Hablemos - Con Tu Voz App')
@section('page-title', '🗣️ Hablemos')
@section('page-subtitle', 'Práctica de pronunciación')

@section('content')
<div class="space-y-6">
    <!-- Progreso del módulo -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-bold">Tu Progreso en Hablemos</h3>
                <p class="text-green-100">3 de 10 lecciones completadas</p>
            </div>
            <div class="text-3xl font-bold">30%</div>
        </div>
        <div class="bg-white bg-opacity-20 rounded-full h-3">
            <div class="bg-white rounded-full h-3" style="width: 30%"></div>
        </div>
    </div>

    <!-- Lecciones disponibles -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">📚 Lecciones</h3>
        <div class="space-y-3">
            @for($i = 1; $i <= 10; $i++)
                @php
                    $status = $i <= 3 ? 'completed' : ($i === 4 ? 'current' : 'locked');
                    $title = match($i) {
                        1 => 'Vocales Básicas',
                        2 => 'Consonantes Simples',
                        3 => 'Sílabas Comunes',
                        4 => 'Palabras de 2 Sílabas',
                        5 => 'Frases Cortas',
                        6 => 'Entonación',
                        7 => 'Ritmo y Pausas',
                        8 => 'Conversación Básica',
                        9 => 'Expresiones Comunes',
                        10 => 'Evaluación Final'
                    };
                @endphp

                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 {{ $status === 'locked' ? 'opacity-50' : '' }}">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center
                                {{ $status === 'completed' ? 'bg-green-100' : ($status === 'current' ? 'bg-blue-100' : 'bg-gray-100') }}">
                                @if($status === 'completed')
                                    <span class="text-green-600">✓</span>
                                @elseif($status === 'current')
                                    <span class="text-blue-600">{{ $i }}</span>
                                @else
                                    <span class="text-gray-400">🔒</span>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $title }}</h4>
                                <p class="text-sm text-gray-600">
                                    @if($status === 'completed')
                                        Completado
                                    @elseif($status === 'current')
                                        Disponible ahora
                                    @else
                                        Bloqueado
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if($status !== 'locked')
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-medium">
                            {{ $status === 'completed' ? 'Repetir' : 'Empezar' }}
                        </button>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Práctica rápida -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
        <div class="flex items-start space-x-3">
            <div class="text-2xl">🎯</div>
            <div>
                <h4 class="font-medium text-gray-900 mb-1">Práctica Rápida</h4>
                <p class="text-sm text-gray-700 mb-3">
                    Practica la pronunciación de palabras comunes
                </p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    Empezar Práctica
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
