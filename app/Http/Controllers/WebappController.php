<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebappController extends Controller
{
    /**
     * Página principal de la webapp
     */
    public function index()
    {
        return view('webapp.index');
    }

    /**
     * Menú principal de actividades
     */
    public function menu()
    {
        return view('webapp.menu');
    }

    /**
     * Páginas específicas de la webapp
     */
    public function page(string $page)
    {
        $viewName = "webapp.{$page}";

        return view()->exists($viewName)
            ? view($viewName)
            : $this->errorView('La página solicitada no existe');
    }

    /**
     * Módulos específicos
     */
    public function module(string $module, ?string $page = null)
    {
        $viewName = $page
            ? "webapp.modulos.{$module}.{$page}"
            : "webapp.modulos.{$module}";

        return view()->exists($viewName)
            ? view($viewName)
            : $this->errorView('El módulo solicitado no existe');
    }

    /**
     * Actividades de dibujaletra
     */
    public function dibujaletra(?string $page = null)
    {
        $viewName = $page
            ? "webapp.dibujaletra.{$page}"
            : 'webapp.dibujaletra.pintaletras';

        return view()->exists($viewName)
            ? view($viewName)
            : $this->errorView('La actividad de dibujaletra no está disponible');
    }

    /**
     * Actividades de speechToText
     */
    public function speechToText(?string $page = null)
    {
        if (!$page) {
            return $this->errorView('Especifica una página de speechToText', 400);
        }

        $viewName = "webapp.speechToText.{$page}";

        return view()->exists($viewName)
            ? view($viewName)
            : $this->errorView('La página de speechToText no existe');
    }

    /**
     * Servir archivos estáticos
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
     * Manifest PWA
     */
    public function manifest()
    {
        $manifestPath = public_path('webapp/manifest.json');

        if (File::exists($manifestPath)) {
            return response()->file($manifestPath, [
                'Content-Type' => 'application/json'
            ]);
        }

        return response()->json(['error' => 'Manifest no encontrado'], 404);
    }

    /**
     * Vista de error personalizada
     */
    private function errorView(string $message, int $status = 404)
    {
        return response()->view('webapp.error', [
            'message' => $message
        ], $status);
    }
}
