<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Con Tu Voz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-green-100 flex flex-col justify-center items-center">
    <div class="text-center">
        <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}" alt="Logo" class="w-32 h-auto mb-6 mx-auto" />
        <h1 class="text-3xl font-bold text-green-800 mb-4">¡Ups!</h1>
        <p class="text-lg text-green-700 mb-6">{{ $message ?? 'Algo salió mal' }}</p>
        <a href="{{ route('webapp.index') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
            Volver al inicio
        </a>
    </div>
</body>
</html>
