@extends('webapp.layouts.app')

@section('title', '🤟 Practica tu letra')

@section('body-class', 'bg-green-100 min-h-screen font-sans text-center p-6 flex flex-col justify-center items-center')

@section('styles')
body {
  background-image: url('{{ asset('common/assets/webapp/img/fondo.jpg') }}');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
#videoWrapper {
  position: relative;
  width: 100%;
  aspect-ratio: 4/3;
  max-width: 100%;
  margin: auto;
}
#outputCanvas, #videoElement {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  border-radius: 1rem;
  object-fit: cover;
}
.overlay-text {
  position: absolute;
  background: rgba(255, 255, 255, 0.7);
  padding: 0.5rem 1rem;
  border-radius: 0.75rem;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  font-weight: bold;
}
#letraDetectada { top: 0.5rem; left: 0.5rem; color: #6b21a8; }
#conteoEstado { bottom: 0.5rem; right: 0.5rem; color: #166534; }
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const videoElement = document.getElementById('videoElement');
  const canvasElement = document.getElementById('outputCanvas');
  const canvasCtx = canvasElement.getContext('2d');
  const letraDiv = document.getElementById('letraDetectada');
  const conteoDiv = document.getElementById('conteoEstado');
  const imgSeña = document.getElementById('imgSeña');
  const letraObjetivoTexto = document.getElementById('letraObjetivoTexto');

  const letrasEstaticas = ['A','B','C','D','E','F','G','H','I','K','L','M','N','O','R','S','T','U','V','W','X','Y'];

  let letraObjetivo = elegirLetraAleatoria();
  let letraDetectada = '';
  let contador = 3;
  let detectando = false;
  let temporizador = null;
  let prevLandmarks = [];

  actualizarLetraObjetivo(letraObjetivo);

  const hands = new Hands({
    locateFile: file => `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`
  });
  hands.setOptions({
    maxNumHands: 1,
    modelComplexity: 1,
    minDetectionConfidence: 0.9,
    minTrackingConfidence: 0.9
  });

  hands.onResults(results => {
    canvasCtx.save();
    canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
    canvasCtx.drawImage(results.image, 0, 0, canvasElement.width, canvasElement.height);

    if (results.multiHandLandmarks && results.multiHandLandmarks.length > 0) {
      let landmarks = suavizarLandmarks(results.multiHandLandmarks[0]);
      drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, { color: '#10B981', lineWidth: 4 });
      drawLandmarks(canvasCtx, landmarks, { color: '#1E3A8A', lineWidth: 2 });

      letraDetectada = detectarLetra(landmarks);
      letraDiv.textContent = `Letra detectada: ${letraDetectada || '...'}`;

      if (letraDetectada === letraObjetivo) {
        if (!detectando) iniciarConteo();
      } else {
        reiniciarConteo();
      }
    } else {
      letraDetectada = '';
      letraDiv.textContent = `Letra detectada: ...`;
      reiniciarConteo();
    }

    actualizarTexto();
    canvasCtx.restore();
  });

  const camera = new Camera(videoElement, {
    onFrame: async () => await hands.send({ image: videoElement }),
    width: 640,
    height: 480
  });
  camera.start();

  videoElement.addEventListener('loadeddata', () => {
    canvasElement.width = videoElement.videoWidth;
    canvasElement.height = videoElement.videoHeight;
  });

  function actualizarLetraObjetivo(nuevaLetra) {
    letraObjetivo = nuevaLetra;
    imgSeña.src = `{{ asset('common/assets/webapp/img/senas/') }}/${letraObjetivo.toLowerCase()}.png`;
    letraObjetivoTexto.textContent = letraObjetivo;
  }

  function actualizarTexto() {
    if (detectando) {
      conteoDiv.innerHTML = `✅ ¡Mantén <span class="text-green-700">${letraObjetivo}</span>! ${contador}`;
    } else if (contador === 0) {
      conteoDiv.innerHTML = `<span class="text-green-700 font-extrabold">✅ ¡Muy bien!</span>`;
    } else {
      conteoDiv.innerHTML = `Haz la letra <span class="text-green-700 font-extrabold">${letraObjetivo}</span>`;
    }
  }

  function iniciarConteo() {
    detectando = true;
    contador = 3;
    temporizador = setInterval(() => {
      contador--;
      if (contador > 0) {
        actualizarTexto();
      } else {
        clearInterval(temporizador);
        detectando = false;
        contador = 0;
        actualizarTexto();
        setTimeout(() => {
          actualizarLetraObjetivo(elegirLetraAleatoria());
          reiniciarConteo();
        }, 1500);
      }
    }, 1000);
  }

  function reiniciarConteo() {
    if (temporizador) clearInterval(temporizador);
    detectando = false;
    contador = 3;
  }

  function elegirLetraAleatoria() {
    return letrasEstaticas[Math.floor(Math.random() * letrasEstaticas.length)];
  }

  function suavizarLandmarks(newLandmarks) {
    if (!prevLandmarks.length) {
      prevLandmarks = JSON.parse(JSON.stringify(newLandmarks));
      return newLandmarks;
    }
    const smoothed = newLandmarks.map((p, i) => ({
      x: (p.x + prevLandmarks[i].x) / 2,
      y: (p.y + prevLandmarks[i].y) / 2,
      z: (p.z + prevLandmarks[i].z) / 2
    }));
    prevLandmarks = smoothed;
    return smoothed;
  }

  function detectarLetra(landmarks) {
    const estirado = (tip, pip) => landmarks[tip].y < landmarks[pip].y - 0.04;
    const pulgarExtendido = Math.abs(landmarks[4].x - landmarks[2].x) > 0.07;

    const indice = estirado(8,6);
    const medio = estirado(12,10);
    const anular = estirado(16,14);
    const menique = estirado(20,18);

    const distIndiceMedio = Math.abs(landmarks[8].x - landmarks[12].x);
    const distIndicePulgar = Math.abs(landmarks[8].x - landmarks[4].x);

    if (!pulgarExtendido && !indice && !medio && !anular && !menique) return 'A';
    if (!pulgarExtendido && indice && medio && anular && menique) return 'B';
    if (pulgarExtendido && indice && medio && anular && menique && distIndicePulgar < 0.06) return 'C';
    if (!pulgarExtendido && indice && !medio && !anular && !menique) return 'D';
    if (pulgarExtendido && !indice && !medio && !anular && !menique) return 'E';
    if (pulgarExtendido && indice && medio && !anular && !menique && distIndiceMedio > 0.03) return 'F';
    if (pulgarExtendido && indice && !medio && !anular && !menique) return 'G';
    if (!pulgarExtendido && indice && medio && !anular && !menique) return distIndiceMedio < 0.015 ? 'R' : 'H';
    if (!pulgarExtendido && !indice && !medio && !anular && menique) return 'I';
    if (pulgarExtendido && indice && medio && !anular && !menique && distIndiceMedio > 0.04) return 'K';
    if (pulgarExtendido && indice && !medio && !anular && !menique) return 'L';
    if (pulgarExtendido && !indice && !medio && !anular && menique) return 'M';
    if (pulgarExtendido && !indice && !medio && anular && menique) return 'N';
    if (pulgarExtendido && indice && medio && anular && menique && distIndicePulgar > 0.06) return 'O';
    if (pulgarExtendido && indice && medio && !anular && !menique && distIndiceMedio > 0.06) return 'P';
    if (pulgarExtendido && indice && !medio && !anular && !menique && distIndicePulgar > 0.07) return 'Q';
    if (pulgarExtendido && !indice && !medio && !anular && !menique) return 'S';
    if (!pulgarExtendido && !indice && !medio && !anular && !menique) return 'T';
    if (!pulgarExtendido && indice && medio && !anular && !menique) return distIndiceMedio < 0.035 ? 'U' : 'V';
    if (!pulgarExtendido && indice && medio && anular && !menique) return 'W';
    if (!pulgarExtendido && indice && !medio && !anular && !menique) return 'X';
    if (pulgarExtendido && !indice && !medio && !anular && menique) return 'Y';

    return '';
  }
});
</script>
@endsection

@section('content')
<section class="bg-white p-6 sm:p-8 rounded-3xl shadow-2xl w-full max-w-4xl border-4 border-green-300
  flex flex-col md:flex-row gap-6 items-center">

  <!-- Panel Izquierdo: Imagen de la seña -->
  <div class="flex flex-col items-center w-full md:w-1/3">
    <h2 class="text-3xl sm:text-4xl font-bold text-green-700 mb-4">👉 Practica Lengua de Señas</h2>
    <img id="imgSeña" src="{{ asset('common/assets/webapp/img/senas/a.png') }}" alt="Seña"
      class="w-72 h-72 object-contain rounded-xl border-4 border-green-300 shadow" />
    <p class="mt-3 text-3xl text-green-800 font-bold">Letra: <span id="letraObjetivoTexto">A</span></p>
  </div>

  <!-- Panel Derecho: Video + Canvas -->
  <div class="flex-1 w-full">
    <p class="text-base sm:text-lg text-gray-700 mb-4">Haz la seña que se indica y mantenla por 3 segundos.</p>
    <div id="videoWrapper" class="mb-6 shadow-lg border-4 border-green-400 rounded-xl overflow-hidden relative">
      <video id="videoElement" class="scale-x-[-1]" autoplay playsinline muted></video>
      <canvas id="outputCanvas" class="scale-x-[-1]" ></canvas>
      <div id="letraDetectada" class="overlay-text absolute"></div>
      <div id="conteoEstado" class="overlay-text absolute"></div>
    </div>

    <a href="{{ route('webapp.menu') }}"
      class="bg-yellow-400 hover:bg-yellow-500 text-white text-lg sm:text-xl font-bold px-6 py-3 rounded-xl shadow inline-block transition transform hover:scale-105">
      ⬅ Volver
    </a>
  </div>
</section>
@endsection
