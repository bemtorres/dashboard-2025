<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Tema</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Theme Script - Must be before CSS to prevent FOUC -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
            console.log('Tema inicial aplicado:', theme);
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: var(--bg-secondary); min-height: 100vh;">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8" style="color: var(--text-primary);">Test de Modo Dark</h1>

        <!-- Botón de prueba -->
        <button
            id="test-toggle"
            onclick="toggleTheme()"
            class="px-4 py-2 rounded-lg text-white font-medium"
            style="background-color: var(--primary-500);"
        >
            Cambiar Tema
        </button>

        <!-- Información del tema -->
        <div class="mt-8 p-4 rounded-lg" style="background-color: var(--bg-primary); border: 1px solid var(--border-primary);">
            <h2 class="text-xl font-semibold mb-4" style="color: var(--text-primary);">Estado del Tema</h2>
            <div class="space-y-2">
                <p style="color: var(--text-secondary);">Tema actual: <span id="current-theme" class="font-mono" style="color: var(--text-primary);"></span></p>
                <p style="color: var(--text-secondary);">Fondo del body: <span id="body-bg" class="font-mono" style="color: var(--text-primary);"></span></p>
                <p style="color: var(--text-secondary);">Color del texto: <span id="text-color" class="font-mono" style="color: var(--text-primary);"></span></p>
            </div>
        </div>

        <!-- Elementos de prueba -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 rounded-lg" style="background-color: var(--bg-primary); border: 1px solid var(--border-primary);">
                <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);">Card de Prueba</h3>
                <p style="color: var(--text-secondary);">Este es un texto de prueba para verificar los colores.</p>
                <button class="mt-2 px-4 py-2 rounded-lg text-white font-medium" style="background-color: var(--primary-500);">Botón Primario</button>
            </div>

            <div class="p-4 rounded-lg" style="background-color: var(--bg-primary); border: 1px solid var(--border-primary);">
                <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);">Otro Card</h3>
                <p style="color: var(--text-secondary);">Más contenido para probar el contraste.</p>
                <button class="mt-2 px-4 py-2 rounded-lg font-medium" style="background-color: var(--bg-primary); color: var(--text-primary); border: 1px solid var(--border-primary);">Botón Secundario</button>
            </div>
        </div>
    </div>

    <script>
        // Función para cambiar tema
        function toggleTheme() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            console.log('Cambiando de', currentTheme, 'a', newTheme);

            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            updateThemeInfo();
        }

        // Función para actualizar la información del tema
        function updateThemeInfo() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const bodyStyles = window.getComputedStyle(document.body);

            document.getElementById('current-theme').textContent = currentTheme;
            document.getElementById('body-bg').textContent = bodyStyles.backgroundColor;
            document.getElementById('text-color').textContent = bodyStyles.color;
        }

        // Actualizar información al cargar
        document.addEventListener('DOMContentLoaded', function() {
            updateThemeInfo();
            console.log('Página de prueba cargada');
        });
    </script>
</body>
</html>
