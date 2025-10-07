<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\AssignProgramController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\WebappController;
use App\Http\Controllers\AppController;
use App\Models\User;

Route::get('/', function () {
  return redirect()->route('login');
});

// Route::get('/test-theme', function () {
//     return view('test-theme');
// });

Route::get('/login-admin', function () {
    return view('auth.login');
})->name('login');

Route::post('/login-admin', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Rutas de la Webapp
Route::prefix('webapp')->name('webapp.')->group(function () {
    Route::get('/', [WebappController::class, 'index'])->name('index');
    Route::get('/menu', [WebappController::class, 'menu'])->name('menu');
    Route::get('/page/{page}', [WebappController::class, 'page'])->name('page');
    Route::get('/module/{module}', [WebappController::class, 'module'])->name('module');
    Route::get('/module/{module}/{page}', [WebappController::class, 'module'])->name('module.page');
    Route::get('/dibujaletra', [WebappController::class, 'dibujaletra'])->name('dibujaletra');
    Route::get('/dibujaletra/{page}', [WebappController::class, 'dibujaletra'])->name('dibujaletra.page');
    Route::get('/speech-to-text/{page}', [WebappController::class, 'speechToText'])->name('speech-to-text');
    Route::get('/assets/{path}', [WebappController::class, 'assets'])->where('path', '.*')->name('assets');
    Route::get('/manifest.json', [WebappController::class, 'manifest'])->name('manifest');
});



Route::get('/demo-dos', function () {
  Auth::login(User::where('email', 'demo@demo.com')->first());
  return redirect()->route('app.dashboard');
})->name('demo.dos');


// Rutas de la App Móvil
Route::prefix('app')->name('app.')->group(function () {
    // Página de inicio - redirige al login
    Route::get('/', function () {
        return redirect()->route('app.login');
    });

    // Rutas de autenticación
    Route::get('/login', [AppController::class, 'login'])->name('login');
    Route::post('/login', [AppController::class, 'loginPost'])->name('login.post');
    Route::post('/logout', [AppController::class, 'logout'])->name('logout');

    // Rutas protegidas (requieren autenticación)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

        // Módulos de la app
        Route::get('/module/{module}', [AppController::class, 'module'])->name('module');
        Route::get('/module/{module}/{page}', [AppController::class, 'module'])->name('module.page');

        // Rutas específicas de módulos
        Route::get('/dibujaletra', [AppController::class, 'module'])->name('module.dibujaletra')->defaults('module', 'dibujaletra');
        Route::get('/dibujaletra/{page}', [AppController::class, 'module'])->name('module.dibujaletra.page')->defaults('module', 'dibujaletra');
        Route::get('/dibujaletra/letter/{letter}', [AppController::class, 'module'])->name('module.dibujaletra.letter')->defaults('module', 'dibujaletra', 'page', 'letter');

        Route::get('/hablemos', [AppController::class, 'module'])->name('module.hablemos')->defaults('module', 'hablemos');
        Route::get('/hablemos/{page}', [AppController::class, 'module'])->name('module.hablemos.page')->defaults('module', 'hablemos');

        Route::get('/comunicate', [AppController::class, 'module'])->name('module.comunicate')->defaults('module', 'comunicate');
        Route::get('/comunicate/{page}', [AppController::class, 'module'])->name('module.comunicate.page')->defaults('module', 'comunicate');

        Route::get('/biblioteca', [AppController::class, 'module'])->name('module.biblioteca')->defaults('module', 'biblioteca');
        Route::get('/biblioteca/{page}', [AppController::class, 'module'])->name('module.biblioteca.page')->defaults('module', 'biblioteca');

        Route::get('/progreso', [AppController::class, 'module'])->name('module.progreso')->defaults('module', 'progreso');
        Route::get('/progreso/{page}', [AppController::class, 'module'])->name('module.progreso.page')->defaults('module', 'progreso');

        // Perfil y configuración
        Route::get('/profile', [AppController::class, 'profile'])->name('profile');
        Route::get('/settings', [AppController::class, 'settings'])->name('settings');
        Route::get('/notifications', [AppController::class, 'notifications'])->name('notifications');
        Route::get('/help', [AppController::class, 'help'])->name('help');
        Route::get('/about', [AppController::class, 'about'])->name('about');

        // Assets de la app
        Route::get('/assets/{path}', [AppController::class, 'assets'])->where('path', '.*')->name('assets');
    });
});

// Rutas del panel de administración
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Gestión de usuarios
    Route::resource('users', UserController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);

    // Catálogo - Programas
    Route::resource('programs', ProgramController::class)->names([
        'index' => 'programs.index',
        'create' => 'programs.create',
        'store' => 'programs.store',
        'show' => 'programs.show',
        'edit' => 'programs.edit',
        'update' => 'programs.update',
        'destroy' => 'programs.destroy',
    ]);

    // Catálogo - Cursos
    Route::resource('courses', CourseController::class)->names([
        'index' => 'courses.index',
        'create' => 'courses.create',
        'store' => 'courses.store',
        'show' => 'courses.show',
        'edit' => 'courses.edit',
        'update' => 'courses.update',
        'destroy' => 'courses.destroy',
    ]);

    // Catálogo - Contenidos
    Route::resource('contents', ContentController::class)->names([
        'index' => 'contents.index',
        'create' => 'contents.create',
        'store' => 'contents.store',
        'show' => 'contents.show',
        'edit' => 'contents.edit',
        'update' => 'contents.update',
        'destroy' => 'contents.destroy',
    ]);

    // Gestión - Asignar Programas
    Route::resource('assign-programs', AssignProgramController::class)->names([
        'index' => 'assign-programs.index',
        'create' => 'assign-programs.create',
        'store' => 'assign-programs.store',
        'show' => 'assign-programs.show',
        'edit' => 'assign-programs.edit',
        'update' => 'assign-programs.update',
        'destroy' => 'assign-programs.destroy',
    ]);

    // Gestión - Reportes
    Route::resource('reports', ReportController::class)->names([
        'index' => 'reports.index',
        'create' => 'reports.create',
        'store' => 'reports.store',
        'show' => 'reports.show',
        'edit' => 'reports.edit',
        'update' => 'reports.update',
        'destroy' => 'reports.destroy',
    ]);

    // Configuración
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});
