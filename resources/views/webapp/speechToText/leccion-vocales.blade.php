@extends('webapp.layouts.app')

@section('title', '🔤 Vocales - Mantener para hablar')

@section('body-class', 'bg-green-100 min-h-screen flex flex-col justify-center items-center p-6')

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
const vocalTexto = document.getElementById("vocalTexto");
const imgVocal = document.getElementById("imgVocal");
const barraVolumen = document.getElementById("barraVolumen");
const indicadorVolumen = document.getElementById("indicadorVolumen");
const resultado = document.getElementById("resultado");
const micButton = document.getElementById("micButton");

let recognition;
let audioContext, analyser, microphone, dataArray;
let vocalObjetivo = obtenerVocalAleatoria();

vocalTexto.textContent = vocalObjetivo;
imgVocal.src = `{{ asset('common/assets/webapp/img/') }}/${vocalObjetivo.toLowerCase()}_sound.png`;

function obtenerVocalAleatoria() {
  const vocales = ["A", "E", "I", "O", "U"];
  return vocales[Math.floor(Math.random() * vocales.length)];
}

function playAudio() {
  const audio = new Audio(`{{ asset('webapp/audio/') }}/${vocalObjetivo.toLowerCase()}.mp3`);
  audio.play();
}

// === CONFIGURAR SPEECH RECOGNITION ===
if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
  const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  recognition = new SpeechRecognition();
  recognition.lang = "es-ES";
  recognition.continuous = false;
  recognition.interimResults = false;
} else {
  alert("Lo siento, tu navegador no soporta reconocimiento de voz.");
}

// === EVENTOS BOTÓN MICROFONO ===
micButton.addEventListener("mousedown", iniciarReconocimiento);
micButton.addEventListener("touchstart", iniciarReconocimiento);

micButton.addEventListener("mouseup", detenerReconocimiento);
micButton.addEventListener("mouseleave", detenerReconocimiento);
micButton.addEventListener("touchend", detenerReconocimiento);

function iniciarReconocimiento() {
  if (recognition) {
    recognition.start();
    indicadorVolumen.textContent = "🎤 Escuchando...";
    resultado.textContent = "";
    micButton.classList.add("bg-green-700", "animate-pulse");
    iniciarVolumen();
  }
}

function detenerReconocimiento() {
  if (recognition) {
    recognition.stop();
    detenerVolumen();
    micButton.classList.remove("bg-green-700", "animate-pulse");
  }
}

// === PROCESAR RESULTADO ===
if (recognition) {
  recognition.onresult = (event) => {
    const transcript = event.results[0][0].transcript.trim().toUpperCase();
    resultado.textContent = `Has dicho: ${transcript}`;

    let detectedVocal = "-";
    if (/A+|AH+|HA+/.test(transcript)) detectedVocal = "A";
    else if (/E+|EH+|HE+/.test(transcript)) detectedVocal = "E";
    else if (/I+|IH+|HI+/.test(transcript)) detectedVocal = "I";
    else if (/O+|OH+|HO+/.test(transcript)) detectedVocal = "O";
    else if (/U+|UH+|HU+/.test(transcript)) detectedVocal = "U";

    if (detectedVocal !== "-") {
      imgVocal.src = `{{ asset('common/assets/webapp/img/') }}/${detectedVocal.toLowerCase()}_sound.png`;
      if (detectedVocal === vocalObjetivo) {
        indicadorVolumen.textContent = `✅ ¡Correcto! Era la ${detectedVocal}`;
      } else {
        indicadorVolumen.textContent = `❌ Dijiste ${detectedVocal}, intenta con la ${vocalObjetivo}`;
      }
    } else {
      indicadorVolumen.textContent = "❌ No reconocí una vocal clara.";
    }
  };

  recognition.onerror = (event) => {
    indicadorVolumen.textContent = "❌ Error de reconocimiento.";
    detenerVolumen();
    micButton.classList.remove("bg-green-700", "animate-pulse");
  };

  recognition.onend = () => {
    detenerVolumen();
    micButton.classList.remove("bg-green-700", "animate-pulse");
    indicadorVolumen.textContent = "🔈 Esperando voz...";
  };
}

// === VOLUMEN CON ANALYSER ===
function iniciarVolumen() {
  audioContext = new (window.AudioContext || window.webkitAudioContext)();
  navigator.mediaDevices.getUserMedia({ audio: true })
    .then(stream => {
      microphone = audioContext.createMediaStreamSource(stream);
      analyser = audioContext.createAnalyser();
      microphone.connect(analyser);
      dataArray = new Uint8Array(analyser.fftSize);
      actualizarVolumen();
    });
}

function actualizarVolumen() {
  if (!analyser) return;
  analyser.getByteTimeDomainData(dataArray);
  let sum = 0;
  for (let i = 0; i < dataArray.length; i++) {
    let val = (dataArray[i] - 128) / 128;
    sum += val * val;
  }
  let volume = Math.sqrt(sum / dataArray.length) * 1000;
  let volPercent = Math.min(volume, 100);

  barraVolumen.style.width = `${volPercent}%`;
  if (volPercent < 30) barraVolumen.className = "h-full bg-green-500";
  else if (volPercent < 70) barraVolumen.className = "h-full bg-yellow-400";
  else barraVolumen.className = "h-full bg-red-500";

  requestAnimationFrame(actualizarVolumen);
}

function detenerVolumen() {
  if (audioContext) {
    audioContext.close();
    audioContext = null;
    analyser = null;
  }
}
</script>
@endsection

@section('content')
<section class="bg-white rounded-3xl shadow-2xl p-8 max-w-xl w-full text-center border-4 border-green-300">
  <h2 class="text-4xl font-bold text-green-700 mb-6">🔤 Repite la vocal</h2>

  <div class="flex items-center justify-center gap-4 mb-6">
    <img id="imgVocal" src="{{ asset('common/assets/webapp/img/a_sound.png') }}" alt="Imagen vocal"
      class="w-32 h-32 object-contain rounded-2xl border-4 border-green-300" />
    <button onclick="playAudio()"
      class="bg-green-400 hover:bg-green-500 text-white text-3xl p-4 rounded-full shadow transition">
      🔊
    </button>
  </div>

  <p class="text-xl font-semibold mb-4">
    Vocal solicitada: <strong id="vocalTexto" class="text-green-800 underline decoration-wavy">A</strong>
  </p>

  <div class="mb-6">
    <div class="w-full h-6 rounded-lg bg-green-200 relative overflow-hidden mb-2">
      <div id="barraVolumen" class="h-full bg-green-500 w-0 transition-all duration-200 ease-in-out"></div>
    </div>
    <div id="indicadorVolumen" class="text-green-600 text-lg font-medium">🔈 Esperando voz...</div>
  </div>

  <button id="micButton"
    class="bg-green-500 hover:bg-green-600 text-white font-bold text-2xl py-3 px-6 rounded-full shadow-lg transition">
    🎙️ Mantén para hablar
  </button>

  <p id="resultado" class="text-lg text-gray-700 mt-6 min-h-[2rem]"></p>

  <div class="mt-8">
    <a href="{{ route('webapp.speech-to-text', 'hablemos') }}"
      class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-lg px-6 py-2 rounded-xl shadow">
      ⬅ Volver
    </a>
  </div>
</section>
@endsection
