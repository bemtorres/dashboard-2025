@extends('webapp.layouts.app')

@section('title', '🗣️ Di esta palabra')

@section('body-class', 'bg-green-100 h-screen font-sans text-center p-6 flex flex-col justify-center items-center')

@section('styles')
body {
  background-image: url('{{ asset('common/assets/webapp/img/fondo.jpg') }}');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  font-family: 'Comic Sans MS', cursive, sans-serif;
}
@endsection

@section('scripts')
<script>
const palabras = [
  { texto: "mamá", imagen: "{{ asset('common/assets/webapp/img/palabras/mama.png') }}" },
  { texto: "papá", imagen: "{{ asset('common/assets/webapp/img/palabras/papa.png') }}" },
  { texto: "agua", imagen: "{{ asset('common/assets/webapp/img/palabras/agua.png') }}" },
  { texto: "sol", imagen: "{{ asset('common/assets/webapp/img/palabras/sol.png') }}" },
  { texto: "luz", imagen: "{{ asset('common/assets/webapp/img/palabras/luz.png') }}" },
  { texto: "gato", imagen: "{{ asset('common/assets/webapp/img/palabras/gato.png') }}" },
  { texto: "perro", imagen: "{{ asset('common/assets/webapp/img/palabras/perro.png') }}" }
];

const palabraTexto = document.getElementById("palabraTexto");
const imgPalabra = document.getElementById("imgPalabra");
const indicadorVolumen = document.getElementById("indicadorVolumen");
const resultado = document.getElementById("resultado");
const startBtn = document.getElementById("startRecognition");
const btnOtraPalabra = document.getElementById("btnOtraPalabra");

let palabraActual = {};

function mostrarNuevaPalabra() {
  palabraActual = palabras[Math.floor(Math.random() * palabras.length)];
  palabraTexto.textContent = palabraActual.texto;
  imgPalabra.src = palabraActual.imagen;
  imgPalabra.alt = `Imagen de ${palabraActual.texto}`;
  resultado.textContent = "";
}

mostrarNuevaPalabra();

btnOtraPalabra.addEventListener("click", () => {
  mostrarNuevaPalabra();
});

let recognition;
if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
  const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  recognition = new SpeechRecognition();
  recognition.lang = "es-ES";
  recognition.continuous = false;
  recognition.interimResults = false;
} else {
  alert("Lo siento, tu navegador no soporta reconocimiento de voz.");
}

startBtn.addEventListener("click", () => {
  if (recognition) {
    recognition.start();
    indicadorVolumen.textContent = "🎤 Escuchando...";
    resultado.textContent = "";
    startBtn.classList.add("bg-green-700", "animate-pulse");
  }
});

if (recognition) {
  recognition.onresult = (event) => {
    const transcript = event.results[0][0].transcript.toLowerCase();
    resultado.textContent = `Dijiste: ${transcript}`;
    if (transcript.includes(palabraActual.texto.toLowerCase())) {
      resultado.innerHTML += ` <span class="text-green-700 font-bold">✅ ¡Correcto!</span>`;
    } else {
      resultado.innerHTML += ` <span class="text-red-600 font-bold">❌ No coincidió</span>`;
    }
  };

  recognition.onend = () => {
    indicadorVolumen.textContent = "🔈 Esperando voz...";
    startBtn.classList.remove("bg-green-700", "animate-pulse");
  };

  recognition.onerror = (event) => {
    resultado.textContent = "Error: " + event.error;
    startBtn.classList.remove("bg-green-700", "animate-pulse");
    indicadorVolumen.textContent = "❌ Error de reconocimiento.";
  };
}
</script>
@endsection

@section('content')
<section class="bg-white rounded-3xl shadow-2xl p-8 max-w-xl w-full text-center border-4 border-green-300">
  <h2 class="text-4xl font-bold text-green-700 mb-6">🗣️ Di esta palabra</h2>

  <img id="imgPalabra" src="{{ asset('common/assets/webapp/img/palabras/mama.png') }}" alt="Imagen de palabra"
    class="w-48 h-48 mx-auto mb-6 object-contain rounded-2xl border-4 border-green-300" />

  <p class="text-4xl font-semibold mb-7">
    <strong id="palabraTexto" class="text-green-700 underline decoration-wavy">mamá</strong>
  </p>

  <div id="indicadorVolumen" class="mt-2 text-green-600 text-lg font-medium mb-6">🔈 Esperando voz...</div>

  <button id="startRecognition"
    class="bg-green-500 hover:bg-green-600 text-white font-bold text-xl py-3 px-6 rounded-xl shadow-lg transition mb-6">
    🎙️ Pronunciar
  </button>

  <button id="btnOtraPalabra"
    class="bg-blue-500 hover:bg-blue-600 text-white font-bold text-xl py-3 px-5 rounded-xl shadow-lg transition mb-6">
    🔄 Otra palabra
  </button>

  <p id="resultado" class="text-lg text-gray-700 mb-6 min-h-[2rem]"></p>

  <a href="{{ route('webapp.speech-to-text', 'hablemos') }}"
    class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-lg px-6 py-2 rounded-xl shadow">
    ⬅ Volver
  </a>
</section>
@endsection
