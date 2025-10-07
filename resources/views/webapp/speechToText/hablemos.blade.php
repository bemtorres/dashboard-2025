@extends('webapp.layouts.app')

@section('title', '🗣️ Hablemos')

@section('body-class', 'min-h-screen bg-green-100 flex items-center justify-center p-6')

@section('styles')
body {
  background-image: url('{{ asset('common/assets/webapp/img/fondo.jpg') }}');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
@endsection

@section('content')
<section class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl p-8 w-full max-w-md text-center border-4 border-green-300">
  <h2 class="text-3xl sm:text-4xl font-bold text-green-700 mb-8 drop-shadow-md">🗣️ ¡Vamos a practicar hablar!</h2>

  <div class="flex flex-col gap-4 w-full">
    <a href="{{ route('webapp.speech-to-text', 'leccion-vocales') }}"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-xl sm:text-2xl font-bold py-4 rounded-2xl shadow transition transform hover:scale-105">
      🔤 Vocales
    </a>
    <a href="{{ route('webapp.speech-to-text', 'leccion-palabras') }}"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-xl sm:text-2xl font-bold py-4 rounded-2xl shadow transition transform hover:scale-105">
      🗣️ Palabras
    </a>
    <a href="{{ route('webapp.speech-to-text', 'comunicate') }}"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-xl sm:text-2xl font-bold py-4 rounded-2xl shadow transition transform hover:scale-105">
      👌👍✊ Módulo práctica
    </a>
    <a href="{{ route('webapp.menu') }}"
      class="w-full max-w-md mx-auto bg-yellow-400 hover:bg-yellow-500 text-white text-xl sm:text-2xl font-bold py-4 rounded-2xl shadow transition transform hover:scale-105">
      ⬅ Volver
    </a>
  </div>
</section>
@endsection
