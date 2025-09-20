<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // El middleware se aplica en las rutas, no en el controlador
        // $this->middleware('auth');
        // $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Obtener estadísticas reales de la base de datos
        $stats = [
            'total_users' => User::count(),
            'admin_users' => User::where('is_admin', true)->count(),
            'regular_users' => User::where('is_admin', false)->count(),
            'verified_users' => User::whereNotNull('email_verified_at')->count(),
            'unverified_users' => User::whereNull('email_verified_at')->count(),
            'users_this_month' => User::whereMonth('created_at', now()->month)->count(),
            'users_last_month' => User::whereMonth('created_at', now()->subMonth()->month)->count(),
        ];

        // Calcular el crecimiento de usuarios
        $growth = $stats['users_last_month'] > 0
            ? round((($stats['users_this_month'] - $stats['users_last_month']) / $stats['users_last_month']) * 100, 1)
            : 0;

        $stats['user_growth'] = $growth;

        return view('admin.dashboard', compact('stats'));
    }


    /**
     * Show the products management page.
     *
     * @return \Illuminate\View\View
     */
    public function products()
    {
        // Aquí puedes obtener los productos de la base de datos
        // $products = Product::with('category')->paginate(15);

        return view('admin.products.index');
    }

    /**
     * Show the orders management page.
     *
     * @return \Illuminate\View\View
     */
    public function orders()
    {
        // Aquí puedes obtener las órdenes de la base de datos
        // $orders = Order::with('user')->paginate(15);

        return view('admin.orders.index');
    }

    /**
     * Show the categories management page.
     *
     * @return \Illuminate\View\View
     */
    public function categories()
    {
        // Aquí puedes obtener las categorías de la base de datos
        // $categories = Category::paginate(15);

        return view('admin.categories.index');
    }

    /**
     * Show the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        return view('admin.settings');
    }
}
