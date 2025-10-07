@extends('webapp.layouts.app')

@section('title', '🎨 Dibuja Letras')

@section('body-class', 'bg-green-100 h-screen font-sans text-center p-6 flex flex-col justify-center items-center')

@section('styles')
body {
  background-image: url('{{ asset('common/assets/webapp/img/fondo.jpg') }}');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
canvas { touch-action: none; display: block; }
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="{{ asset('common/assets/webapp/dibujaletra/letras.js') }}"></script>
<script>
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const gridSize = 150;
let cellSize;

let userGrid = Array(gridSize).fill().map(() => Array(gridSize).fill(0));
let targetGrid = Array(gridSize).fill().map(() => Array(gridSize).fill(0));

const grosorPincel = 4;

const palabrasEjemplo = {
  A: "Abeja 🐝", B: "Banana 🍌", C: "Casa 🏠", D: "Delfín 🐬",
  E: "Elefante 🐘", F: "Flor 🌸", G: "Gato 🐱", H: "Helado 🍦",
  I: "Iglesia ⛪", J: "Jirafa 🦒", K: "Koala 🐨", L: "Luna 🌙",
  M: "Mariposa 🦋", N: "Nido 🪺", O: "Oso 🐻", P: "Pez 🐠",
  Q: "Queso 🧀", R: "Ratón 🐭", S: "Sol ☀️", T: "Tigre 🐯",
  U: "Uvas 🍇", V: "Vaca 🐄", W: "Waffle 🧇", X: "Xilófono 🎼",
  Y: "Yate ⛵", Z: "Zorro 🦊"
};

function resizeCanvas() {
  const size = canvas.clientWidth;
  canvas.width = size;
  canvas.height = size;
  cellSize = canvas.width / gridSize;
  drawGrid();
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

function centerAndDrawLetter(letra) {
  if (!letra || !letra._lines) return;
  let minX=gridSize, minY=gridSize, maxX=0, maxY=0;
  letra._lines.forEach(([p1, p2]) => {
    [p1, p2].forEach(([x, y]) => {
      if (x<minX) minX=x;
      if (y<minY) minY=y;
      if (x>maxX) maxX=x;
      if (y>maxY) maxY=y;
    });
  });
  const offsetX = Math.round((gridSize - (minX + maxX)) /2);
  const offsetY = Math.round((gridSize - (minY + maxY)) /2);
  letra._lines.forEach(([p1, p2, t]) => {
    drawLineCentered(targetGrid, p1, p2, t, offsetX, offsetY);
  });
}

async function drawLineCentered(grid, p1, p2, t, offsetX, offsetY) {
  const [x1, y1] = p1;
  const [x2, y2] = p2;
  const dx = x2 - x1;
  const dy = y2 - y1;
  const steps = Math.max(Math.abs(dx), Math.abs(dy));
  for (let i = 0; i <= steps; i++) {
    const x = Math.round(x1 + (dx * i) / steps) + offsetX;
    const y = Math.round(y1 + (dy * i) / steps) + offsetY;
    for (let tx = -t; tx <= t; tx++) {
      for (let ty = -t; ty <= t; ty++) {
        const gx = x + tx, gy = y + ty;
        if (gx >= 0 && gy >= 0 && gx < gridSize && gy < gridSize)
          grid[gy][gx] = 1;
      }
    }
    drawGrid();
    await new Promise(r => setTimeout(r, 2));
  }
}

function drawGrid() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  for (let y = 0; y < gridSize; y++) {
    for (let x = 0; x < gridSize; x++) {
      if (targetGrid[y][x]) {
        ctx.fillStyle = '#8888ff88';
        ctx.fillRect(x * cellSize, y * cellSize, cellSize, cellSize);
      }
      if (userGrid[y][x]) {
        ctx.fillStyle = '#00aa00';
        ctx.fillRect(x * cellSize, y * cellSize, cellSize, cellSize);
      }
    }
  }
}

async function cargarLetra() {
  const letraSeleccionada = document.getElementById('letra').value;
  const ej = document.getElementById("ejemploPalabra");
  if (ej) {
    ej.textContent = `${letraSeleccionada} de ${palabrasEjemplo[letraSeleccionada] || ''}`;
  }
  userGrid = Array(gridSize).fill().map(() => Array(gridSize).fill(0));
  targetGrid = Array(gridSize).fill().map(() => Array(gridSize).fill(0));
  const letraFn = letras[letraSeleccionada];
  if (letraFn && letraFn._lines) {
    centerAndDrawLetter(letraFn);
  }
}

function limpiarCanvas() {
  userGrid = Array(gridSize).fill().map(() => Array(gridSize).fill(0));
  drawGrid();
}

function verificarDibujo() {
  let correctas = 0, total = 0;
  for (let y = 0; y < gridSize; y++) {
    for (let x = 0; x < gridSize; x++) {
      if (targetGrid[y][x]) {
        total++;
        if (userGrid[y][x]) correctas++;
      }
    }
  }
  const porcentaje = total > 0 ? (correctas / total) * 100 : 0;
  const mensaje = document.getElementById('mensaje');
  mensaje.textContent = porcentaje >= 80
    ? `🎉 ¡Muy bien! ${porcentaje.toFixed(1)}% correcto`
    : `Intenta de nuevo. ${porcentaje.toFixed(1)}% correcto`;
  mensaje.classList.toggle('text-green-800', porcentaje >= 80);
  mensaje.classList.toggle('text-red-600', porcentaje < 80);
  if (porcentaje >= 80) {
    confetti({particleCount:120, spread:70, origin:{y:0.6}});
  }
}

function getMouseGridPos(evt) {
  const rect = canvas.getBoundingClientRect();
  const x = Math.floor((evt.clientX - rect.left) / cellSize);
  const y = Math.floor((evt.clientY - rect.top) / cellSize);
  return { x, y };
}

function pintar(x, y) {
  for (let dx = -grosorPincel; dx <= grosorPincel; dx++) {
    for (let dy = -grosorPincel; dy <= grosorPincel; dy++) {
      const nx = x + dx, ny = y + dy;
      if (nx >= 0 && ny >= 0 && nx < gridSize && ny < gridSize) {
        userGrid[ny][nx] = 1;
      }
    }
  }
}

let dibujando = false;
canvas.addEventListener('mousedown', e => {
  dibujando = true;
  const { x, y } = getMouseGridPos(e);
  pintar(x, y);
  drawGrid();
});
canvas.addEventListener('mousemove', e => {
  if (!dibujando) return;
  const { x, y } = getMouseGridPos(e);
  pintar(x, y);
  drawGrid();
});
canvas.addEventListener('mouseup', () => dibujando = false);
canvas.addEventListener('mouseleave', () => dibujando = false);
canvas.addEventListener('touchstart', e => {
  e.preventDefault();
  dibujando = true;
  const touch = e.touches[0];
  const rect = canvas.getBoundingClientRect();
  const x = Math.floor((touch.clientX - rect.left) / cellSize);
  const y = Math.floor((touch.clientY - rect.top) / cellSize);
  pintar(x, y);
  drawGrid();
});
canvas.addEventListener('touchmove', e => {
  e.preventDefault();
  if (!dibujando) return;
  const touch = e.touches[0];
  const rect = canvas.getBoundingClientRect();
  const x = Math.floor((touch.clientX - rect.left) / cellSize);
  const y = Math.floor((touch.clientY - rect.top) / cellSize);
  pintar(x, y);
  drawGrid();
});
canvas.addEventListener('touchend', e => {
  e.preventDefault();
  dibujando = false;
});

const select = document.getElementById('letra');
select.innerHTML = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').map(l => `<option value="${l}">${l}</option>`).join('');
cargarLetra();
</script>
@endsection

@section('content')
<section class="bg-white p-4 rounded-3xl shadow-xl max-w-xl w-full border-4 border-green-300 text-center mx-auto">
  <p class="text-lg font-semibold mb-2 text-green-800 flex items-center justify-center gap-2">
    🦎 ¡Hola! Ayúdame a pintar esta letra
  </p>
  <h1 class="text-xl font-bold text-green-700 mb-2">🎨 ¡Dibuja la letra!</h1>

  <p id="ejemploPalabra" class="text-lg font-semibold text-green-700 mb-4"></p>

  <div class="mb-2 flex items-center justify-center gap-2">
    <label for="letra" class="text-lg font-semibold text-green-800">Letra:</label>
    <select id="letra" onchange="cargarLetra()"
      class="text-lg rounded-xl bg-green-200 text-green-900 px-3 py-1 focus:outline-none focus:ring-2 focus:ring-green-600">
    </select>
  </div>

  <div class="flex justify-center mb-3 w-full">
    <canvas id="canvas"
      class="w-full max-w-[85vw] aspect-[1/1] border-4 border-green-700 rounded-2xl shadow bg-white"></canvas>
  </div>

  <div class="flex flex-wrap justify-center gap-3 mb-2">
    <button onclick="verificarDibujo()"
      class="bg-green-400 hover:bg-green-500 text-white font-bold text-base py-2 px-4 rounded-xl shadow transition">
      ✅ Verificar
    </button>
    <button onclick="limpiarCanvas()"
      class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-base py-2 px-4 rounded-xl shadow transition">
      🧽 Limpiar
    </button>
    <a href="{{ route('webapp.menu') }}"
      class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-base py-2 px-4 rounded-xl shadow transition">
      ⬅ Menú
    </a>
  </div>

  <div id="mensaje" class="text-lg font-bold mt-1 text-green-800 min-h-[2rem]"></div>
</section>
@endsection
