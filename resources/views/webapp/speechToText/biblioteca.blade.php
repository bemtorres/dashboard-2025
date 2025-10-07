@extends('webapp.layouts.app')

@section('title', '🗣️ Biblioteca - Con Tu Voz')

@section('body-class', 'bg-green-100 font-sans text-center p-6 flex flex-col justify-center items-center h-screen')

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
<section class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 w-full max-w-md sm:max-w-lg md:max-w-xl text-center border-4 border-green-300">
  <h2 class="text-3xl sm:text-4xl font-bold text-green-700 mb-6 drop-shadow-md">
    🗣️ ¡Esta es la biblioteca!
  </h2>
  <p class="text-base sm:text-lg text-green-800 mb-8">
    Aquí podrás encontrar todo lo que has aprendido, además de consejos, información y mucho más.
  </p>

  <div class="flex flex-col gap-4 w-full">
    <a href="#"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-lg sm:text-2xl font-bold py-4 rounded-3xl shadow transition transform hover:scale-105">
      🔤 Vocales
    </a>
    <a href="#"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-lg sm:text-2xl font-bold py-4 rounded-3xl shadow transition transform hover:scale-105">
      🗣️ Palabras
    </a>
    <a href="#"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-lg sm:text-2xl font-bold py-4 rounded-3xl shadow transition transform hover:scale-105">
      💡 Consejos
    </a>
    <a href="#"
      class="w-full max-w-md mx-auto bg-green-400 hover:bg-green-500 text-white text-lg sm:text-2xl font-bold py-4 rounded-3xl shadow transition transform hover:scale-105">
      📚 Cuentos cortos
    </a>
    <a href="{{ route('webapp.menu') }}"
      class="w-full max-w-md mx-auto bg-yellow-400 hover:bg-yellow-500 text-white text-lg sm:text-2xl font-bold py-4 rounded-3xl shadow transition transform hover:scale-105">
      ⬅ Volver
    </a>
  </div>
</section>
@endsection
