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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-theme', function () {
    return view('test-theme');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
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
