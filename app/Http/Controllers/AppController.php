<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AppController extends Controller
{
    /**
     * Constructor - aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'loginPost', 'register', 'registerPost']);
    }

    /**
     * Página de login de la app móvil
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('app.dashboard');
        }

        return view('app.auth.login');
    }

    /**
     * Procesar login
     */
    public function loginPost(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'Debe ser un correo electrónico válido.',
                'password.required' => 'La contraseña es obligatoria.'
            ]);

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                // Log del login exitoso
                \Log::info('Login exitoso para usuario: ' . $credentials['email']);

                // Redirigir al dashboard después del login exitoso
                return redirect()->route('app.dashboard')->with('success', '¡Bienvenido de vuelta!');
            }

            // Log del intento de login fallido
            \Log::warning('Intento de login fallido para: ' . $credentials['email']);

            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ])->onlyInput('email');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error en login: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Ha ocurrido un error. Por favor, intenta nuevamente.'
            ])->withInput();
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('app.login');
    }

    /**
     * Página de registro
     */
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('app.dashboard');
        }

        return view('app.auth.register');
    }

    /**
     * Procesar registro
     */
    public function registerPost(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'terms' => 'required|accepted'
            ], [
                'name.required' => 'El nombre es obligatorio.',
                'last_name.required' => 'El apellido es obligatorio.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'Debe ser un correo electrónico válido.',
                'email.unique' => 'Este correo electrónico ya está registrado.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.confirmed' => 'Las contraseñas no coinciden.',
                'terms.required' => 'Debes aceptar los términos y condiciones.',
                'terms.accepted' => 'Debes aceptar los términos y condiciones.'
            ]);

            // Crear el usuario
            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'is_admin' => false,
                'email_verified_at' => now()
            ]);

            // Log del registro exitoso
            \Log::info('Usuario registrado exitosamente: ' . $user->email);

            // Autenticar al usuario después del registro
            Auth::login($user);

            // Regenerar sesión
            $request->session()->regenerate();

            return redirect()->route('app.dashboard')->with('success', '¡Cuenta creada exitosamente! ¡Bienvenido!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error en registro: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Ha ocurrido un error. Por favor, intenta nuevamente.'
            ])->withInput();
        }
    }

    /**
     * Dashboard principal de la app móvil
     */
    public function dashboard()
    {
        // Obtener usuario autenticado o crear uno dummy para desarrollo
        $user = Auth::user();
        if (!$user) {
            // Para desarrollo sin autenticación
            $user = (object) [
                'name' => 'Usuario',
                'email' => 'usuario@ejemplo.com'
            ];
        }

        $modules = [
            'dibujaletra' => [
                'title' => '🎨 Pinta Letras',
                'description' => 'Aprende dibujando letras',
                'icon' => 'common/assets/webapp/img/gecko dibujando.png',
                'route' => 'app.module.dibujaletra',
                'color' => 'bg-blue-500'
            ],
            'hablemos' => [
                'title' => '🗣️ Hablemos!',
                'description' => 'Práctica de pronunciación',
                'icon' => 'common/assets/webapp/img/gecko habla.png',
                'route' => 'app.module.hablemos',
                'color' => 'bg-green-500'
            ],
            'comunicate' => [
                'title' => '🤝 Comunícate',
                'description' => 'Comunicación efectiva',
                'icon' => 'common/assets/webapp/img/ChatGPT Image 6 jul 2025, 10_00_48 a.m..png',
                'route' => 'app.module.comunicate',
                'color' => 'bg-purple-500'
            ],
            'biblioteca' => [
                'title' => '📚 Biblioteca',
                'description' => 'Recursos educativos',
                'icon' => 'common/assets/webapp/img/gecko biblioteca.png',
                'route' => 'app.module.biblioteca',
                'color' => 'bg-orange-500'
            ],
            'progreso' => [
                'title' => '📐 Mi Progreso',
                'description' => 'Seguimiento de avances',
                'icon' => 'common/assets/webapp/img/gecko logistico.png',
                'route' => 'app.module.progreso',
                'color' => 'bg-red-500'
            ]
        ];

        return view('app.dashboard', compact('user', 'modules'));
    }

    /**
     * Módulo específico de la app
     */
    public function module(string $module, ?string $page = null)
    {
        $user = Auth::user();

        // Validar que el módulo existe
        $validModules = ['dibujaletra', 'hablemos', 'comunicate', 'biblioteca', 'progreso'];

        if (!in_array($module, $validModules)) {
            return $this->errorView('El módulo solicitado no existe');
        }

        $viewName = $page
            ? "app.modules.{$module}.{$page}"
            : "app.modules.{$module}.index";

        return view()->exists($viewName)
            ? view($viewName, compact('user', 'module'))
            : $this->errorView('La página del módulo no existe');
    }

    /**
     * Perfil del usuario
     */
    public function profile()
    {
        $user = Auth::user();
        return view('app.profile', compact('user'));
    }

    /**
     * Configuraciones de la app
     */
    public function settings()
    {
        $user = Auth::user();
        return view('app.settings', compact('user'));
    }

    /**
     * Notificaciones
     */
    public function notifications()
    {
        $user = Auth::user();
        return view('app.notifications', compact('user'));
    }

    /**
     * Ayuda y soporte
     */
    public function help()
    {
        return view('app.help');
    }

    /**
     * Acerca de la app
     */
    public function about()
    {
        return view('app.about');
    }

    /**
     * Servir archivos estáticos de la app
     */
    public function assets(string $path)
    {
        $filePath = public_path("common/assets/webapp/{$path}");

        if (File::exists($filePath)) {
            return response()->file($filePath, [
                'Content-Type' => File::mimeType($filePath)
            ]);
        }

        return $this->errorView('El archivo solicitado no existe');
    }

    /**
     * Vista de error personalizada
     */
    private function errorView(string $message, int $status = 404)
    {
        return response()->view('app.error', [
            'message' => $message
        ], $status);
    }
}
