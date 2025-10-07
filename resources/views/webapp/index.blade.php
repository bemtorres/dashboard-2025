@extends('webapp.layouts.app')

@section('title', 'Con Tu Voz')

@section('body-class', 'h-screen bg-green-100 flex flex-col justify-center items-center')



@section('content')
<div class="text-center">
    <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}" alt="Logo" class="w-40 h-auto mb-6 animate-pulse" />
    <h1 class="text-3xl font-bold text-green-800">Con Tu Voz</h1>
    <p class="mt-4 text-green-800 mb-6">Redirigiendo al menú...</p>

    <!-- Botón de instalación PWA (inicialmente oculto) -->
    <button id="install-btn"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition-colors shadow-lg hidden"
            style="display: none;">
        📱 Instalar App
    </button>

    <!-- Botón para ir al menú -->
    <div class="mt-4">
        <a href="{{ route('webapp.menu') }}"
           class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">
            Ir al Menú
        </a>
    </div>
</div>
@endsection
@section('scripts')
<script>
setTimeout(function() {
    window.location.href = '{{ route('webapp.menu') }}';
}, 3000);
</script>
@endsection
