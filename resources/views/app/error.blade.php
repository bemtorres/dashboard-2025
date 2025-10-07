@extends('app.layouts.app')

@section('title', 'Error - Con Tu Voz App')
@section('page-title', '⚠️ Error')
@section('hideBottomNav', true)

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center space-y-6">
    <div class="text-6xl">😔</div>

    <div>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">¡Oops!</h2>
        <p class="text-gray-600 mb-4">
            {{ $message ?? 'Algo salió mal. Por favor, intenta nuevamente.' }}
        </p>
    </div>

    <div class="space-y-3">
        <button onclick="history.back()"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition-colors">
            ← Volver
        </button>

        <a href="{{ route('app.dashboard') }}"
           class="block bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition-colors">
            🏠 Ir al Inicio
        </a>
    </div>

    <div class="text-sm text-gray-500">
        Si el problema persiste, contacta a soporte.
    </div>
</div>
@endsection
