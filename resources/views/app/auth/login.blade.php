@extends('app.layouts.login')

@section('title', 'Iniciar Sesión - Con Tu Voz App')

@section('styles')
<style>
    .login-container {
        min-height: 100vh;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        width: 100%;
        max-width: 400px;
        animation: slideUp 0.5s ease-out;
        margin: auto;
        position: relative;
        z-index: 10;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-input {
        transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
    }

    .form-input:focus {
        border-color: #34d399;
        box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.1);
    }

    .login-btn {
        background: linear-gradient(135deg, #34d399, #10b981);
        transition: all 0.3s ease;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(52, 211, 153, 0.3);
    }

    .login-btn:active {
        transform: translateY(0);
    }

    .floating-logo {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    /* Asegurar centrado perfecto */
    @media (max-height: 600px) {
        .login-container {
            align-items: flex-start;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 0.5rem;
        }

        .login-card {
            padding: 1.5rem;
            max-width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Logo y título -->
        <div class="text-center">
            <div class="floating-logo mb-2">
                <img src="{{ asset('common/assets/webapp/img/gecko cara.png') }}"
                     alt="Logo" class="w-16 h-16 mx-auto">
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Con Tu Voz</h1>
            <p class="text-gray-600">Inicia sesión para continuar</p>
        </div>

        <!-- Mensajes de éxito y error -->
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Formulario de login -->
        <form method="POST" action="{{ route('app.login.post') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Correo Electrónico
                </label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-input w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-0"
                       placeholder="tu@email.com"
                       required
                       autocomplete="email"
                       autofocus>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Contraseña
                </label>
                <div class="relative">
                    <input type="password"
                           id="password"
                           name="password"
                           class="form-input w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-0 pr-12"
                           placeholder="Tu contraseña"
                           required
                           autocomplete="current-password">
                    <button type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Recordar sesión -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox"
                           name="remember"
                           class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Recordarme</span>
                </label>

                <a href="#" class="text-sm text-green-600 hover:text-green-500">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <!-- Botón de login -->
            <button type="submit" class="login-btn w-full text-white font-bold py-3 px-6 rounded-lg">
                  Iniciar Sesión
            </button>
        </form>

        {{-- <!-- Usuarios de prueba -->
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <h4 class="text-sm font-medium text-blue-900 mb-2">🔑 Usuarios de Prueba:</h4>
            <div class="text-xs text-blue-800 space-y-1">
                <div><strong>Admin:</strong> admin@example.com / password</div>
                <div><strong>Usuario:</strong> juan.perez@example.com / password</div>
                <div><strong>Usuario:</strong> maria.garcia@example.com / password</div>
            </div>
        </div> --}}

        <!-- Enlaces adicionales -->
        <div class="mt-8 text-center space-y-4">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">O continúa como invitado</span>
                </div>
            </div>

            <a href="{{ route('webapp.index') }}"
               class="block w-full text-center py-3 px-6 border-2 border-green-500 text-green-600 font-bold rounded-lg hover:bg-green-50 transition-colors">
                Ver Demo 1
            </a>

            <a href="{{ route('demo.dos') }}"
              class="block w-full text-center py-3 px-6 border-2 border-green-500 text-green-600 font-bold rounded-lg hover:bg-green-50 transition-colors">
              Ver Demo 2
          </a>

            {{-- <p class="text-sm text-gray-600">
                ¿No tienes cuenta?
                <a href="#" class="text-green-600 hover:text-green-500 font-medium">
                    Contacta al administrador
                </a>
            </p> --}}
        </div>

        <!-- Información de la app -->
        <div class="mt-6 pt-6 border-t border-gray-200 text-center">
            <p class="text-xs text-gray-500">
                Versión 1.0.0 • Con Tu Voz App
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
            `;
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
        }
    }

    // Auto-focus en el primer campo
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('email').focus();
    });

    // Manejar errores de validación
    @if($errors->any())
        // Mostrar notificación de error
        setTimeout(() => {
            alert('Por favor, verifica tus credenciales e intenta nuevamente.');
        }, 500);
    @endif
</script>
@endsection
