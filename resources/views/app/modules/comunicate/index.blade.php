@extends('app.layouts.app')

@section('title', 'Comunícate - Con Tu Voz App')
@section('page-title', '🤝 Comunícate')
@section('page-subtitle', 'Comunicación efectiva')

@section('content')
<div class="space-y-6">
    <!-- Progreso del módulo -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-bold">Tu Progreso en Comunicación</h3>
                <p class="text-purple-100">2 de 8 diálogos completados</p>
            </div>
            <div class="text-3xl font-bold">25%</div>
        </div>
        <div class="bg-white bg-opacity-20 rounded-full h-3">
            <div class="bg-white rounded-full h-3" style="width: 25%"></div>
        </div>
    </div>

    <!-- Diálogos disponibles -->
    <div>
        <h3 class="text-lg font-semibold text-gray-900 mb-4">💬 Diálogos</h3>
        <div class="space-y-3">
            @for($i = 1; $i <= 8; $i++)
                @php
                    $status = $i <= 2 ? 'completed' : ($i === 3 ? 'current' : 'locked');
                    $title = match($i) {
                        1 => 'Saludos y Presentaciones',
                        2 => 'En la Tienda',
                        3 => 'En el Restaurante',
                        4 => 'Pedir Direcciones',
                        5 => 'Hablar por Teléfono',
                        6 => 'En el Trabajo',
                        7 => 'Situaciones de Emergencia',
                        8 => 'Conversación Avanzada'
                    };
                @endphp

                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 {{ $status === 'locked' ? 'opacity-50' : '' }}">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center
                                {{ $status === 'completed' ? 'bg-green-100' : ($status === 'current' ? 'bg-purple-100' : 'bg-gray-100') }}">
                                @if($status === 'completed')
                                    <span class="text-green-600">✓</span>
                                @elseif($status === 'current')
                                    <span class="text-purple-600">{{ $i }}</span>
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
                        <button class="bg-purple-500 text-white px-4 py-2 rounded-lg text-sm font-medium">
                            {{ $status === 'completed' ? 'Repetir' : 'Empezar' }}
                        </button>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Práctica de conversación -->
    <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
        <div class="flex items-start space-x-3">
            <div class="text-2xl">💬</div>
            <div>
                <h4 class="font-medium text-gray-900 mb-1">Práctica de Conversación</h4>
                <p class="text-sm text-gray-700 mb-3">
                    Practica diálogos comunes en situaciones reales
                </p>
                <button class="bg-purple-500 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    Empezar Conversación
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
