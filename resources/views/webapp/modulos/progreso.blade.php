@extends('webapp.layouts.app')

@section('title', '📈 Tu Progreso')

@section('body-class', 'bg-green-100 h-screen font-sans text-center p-6 flex flex-col justify-center')

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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Gráfico de barras - vocales
new Chart(document.getElementById('graficoVocales'), {
  type: 'bar',
  data: {
    labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
    datasets: [{
      label: 'Vocales completadas',
      data: [2, 3, 4, 3, 5],
      backgroundColor: '#34D399'
    }]
  },
  options: {
    scales: { y: { beginAtZero: true } }
  }
});

// Gráfico de dona - precisión
new Chart(document.getElementById('graficoPrecision'), {
  type: 'doughnut',
  data: {
    labels: ['Correctas', 'Incorrectas'],
    datasets: [{
      data: [75, 25],
      backgroundColor: ['#10B981', '#FBBF24']
    }]
  }
});

// Gráfico de líneas - sesiones
new Chart(document.getElementById('graficoSesiones'), {
  type: 'line',
  data: {
    labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
    datasets: [{
      label: 'Sesiones activas',
      data: [2, 4, 3, 5],
      fill: false,
      borderColor: '#10B981',
      tension: 0.4
    }]
  },
  options: {
    scales: { y: { beginAtZero: true } }
  }
});
</script>
@endsection

@section('content')
<section class="max-w-4xl mx-auto bg-white p-8 rounded-3xl shadow-2xl border-4 border-green-300">
  <h1 class="text-4xl font-bold text-green-700 mb-8 text-center">📈 Tu Progreso</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Gráfico 1 -->
    <div class="bg-green-50 p-4 rounded-xl shadow border border-green-300">
      <h2 class="text-xl font-bold text-green-700 mb-2">📆 Vocales esta semana</h2>
      <canvas id="graficoVocales" height="200"></canvas>
    </div>

    <!-- Gráfico 2 -->
    <div class="bg-green-50 p-4 rounded-xl shadow border border-green-300">
      <h2 class="text-xl font-bold text-green-700 mb-2">🗣️ Precisión al hablar</h2>
      <canvas id="graficoPrecision" height="200"></canvas>
    </div>

    <!-- Gráfico 3 -->
    <div class="bg-green-50 p-4 rounded-xl shadow border border-green-300 col-span-1 md:col-span-2">
      <h2 class="text-xl font-bold text-green-700 mb-2">🕒 Sesiones este mes</h2>
      <canvas id="graficoSesiones" height="120"></canvas>
    </div>
  </div>

  <div class="text-center mt-10">
    <a href="{{ route('webapp.menu') }}"
      class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-lg px-6 py-3 rounded-xl shadow">
      ⬅ Volver
    </a>
  </div>
</section>
@endsection
