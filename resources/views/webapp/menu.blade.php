@extends('webapp.layouts.app')

@section('title', 'Menú Principal - Gecko')

@section('body-class', 'bg-green-100 font-sans text-center p-6 flex flex-col justify-center h-screen')

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
<h1 class="text-4xl font-bold text-white mb-5">¡Elige una actividad!</h1>

<div class="flex flex-col gap-3 sm:gap-2 md:gap-2 xl:gap-2 items-center w-full max-w-md mx-auto">
    <!-- Boton Pinta Letras -->
    <div onclick="location.href='{{ route('webapp.dibujaletra') }}'"
      class="w-full max-w-xl bg-green-400 hover:bg-green-500 text-white font-bold text-2xl rounded-3xl shadow-lg transition transform hover:scale-105 cursor-pointer flex items-center justify-between p-6">
      <span class="text-left">🎨 Pinta Letras</span>
      <img src="{{ asset('common/assets/webapp/img/gecko dibujando.png') }}" alt="Gecko con pincel" class="w-1/4 h-auto object-cover" />
    </div>

    <!-- Boton Hablemos -->
    <div onclick="location.href='{{ route('webapp.speech-to-text', 'hablemos') }}'"
      class="w-full max-w-2xl bg-green-400 hover:bg-green-500 text-white font-bold text-2xl rounded-3xl shadow-lg transition transform hover:scale-105 cursor-pointer flex items-center justify-between p-6">
      <span class="text-left">🗣️ Hablemos!</span>
      <img src="{{ asset('common/assets/webapp/img/gecko habla.png') }}" alt="Gecko enseñando" class="w-1/6 h-auto object-cover" />
    </div>

    <!-- Boton Comunicate -->
    <div onclick="location.href='{{ route('webapp.speech-to-text', 'comunicate') }}'"
      class="w-full max-w-2xl bg-green-400 hover:bg-green-500 text-white font-bold text-2xl rounded-3xl shadow-lg transition transform hover:scale-105 cursor-pointer flex items-center justify-between p-6">
      <span class="text-left">🤝 Comunícate</span>
      <img src="{{ asset('common/assets/webapp/img/ChatGPT Image 6 jul 2025, 10_00_48 a.m..png') }}" alt="Gecko saludando"
        class="w-1/4 h-auto object-cover" />
    </div>

    <!-- Boton Biblioteca -->
    <div onclick="location.href='{{ route('webapp.speech-to-text', 'biblioteca') }}'"
      class="w-full max-w-2xl bg-green-400 hover:bg-green-500 text-white font-bold text-2xl rounded-3xl shadow-lg transition transform hover:scale-105 cursor-pointer flex items-center justify-between p-6">
      <span class="text-left">📚 Biblioteca</span>
      <img src="{{ asset('common/assets/webapp/img/gecko biblioteca.png') }}" alt="Gecko saludando" class="w-1/4 h-auto object-cover" />
    </div>

    <!-- Boton Mi Progreso -->
    <div onclick="location.href='{{ route('webapp.module', 'progreso') }}'"
      class="w-full max-w-2xl bg-green-400 hover:bg-green-500 text-white font-bold text-2xl rounded-3xl shadow-lg transition transform hover:scale-105 cursor-pointer flex items-center justify-between p-6">
      <span class="text-left">📐Mi progreso</span>
      <img src="{{ asset('common/assets/webapp/img/gecko logistico.png') }}" alt="Gecko con libro" class="w-1/4 h-auto object-cover" />
    </div>
</div>
@endsection
