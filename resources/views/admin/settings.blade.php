@extends('layouts.app')

@section('title', 'Configuración')
@section('page-title', 'Configuración')

@section('content')
<div class="space-y-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Configuración General</h3>

            <form class="space-y-6">
                <!-- Información del sitio -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Información del Sitio</h4>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="site_name" class="block text-sm font-medium text-gray-900 mb-2">Nombre del sitio</label>
                            <input type="text" id="site_name" name="site_name" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="Mi Aplicación">
                        </div>

                        <div>
                            <label for="site_email" class="block text-sm font-medium text-gray-900 mb-2">Email de contacto</label>
                            <input type="email" id="site_email" name="site_email" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="contacto@miaplicacion.com">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="site_description" class="block text-sm font-medium text-gray-900 mb-2">Descripción del sitio</label>
                            <textarea id="site_description" name="site_description" rows="3" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300 resize-none">Una aplicación increíble construida con Laravel y Tailwind CSS</textarea>
                        </div>
                    </div>
                </div>

                <!-- Configuración de usuarios -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Configuración de Usuarios</h4>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="allow_registration" name="allow_registration" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200" checked>
                                <label for="allow_registration" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Permitir registro de nuevos usuarios
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="email_verification" name="email_verification" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200" checked>
                                <label for="email_verification" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Requerir verificación de email
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="two_factor_auth" name="two_factor_auth" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                                <label for="two_factor_auth" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Habilitar autenticación de dos factores
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configuración de notificaciones -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Notificaciones</h4>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="email_notifications" name="email_notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200" checked>
                                <label for="email_notifications" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Notificaciones por email
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="push_notifications" name="push_notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                                <label for="push_notifications" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Notificaciones push
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="notification_email" class="block text-sm font-medium text-gray-900 mb-2">Email para notificaciones</label>
                            <input type="email" id="notification_email" name="notification_email" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="admin@miaplicacion.com">
                        </div>
                    </div>
                </div>

                <!-- Configuración de seguridad -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Seguridad</h4>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="session_timeout" class="block text-sm font-medium text-gray-900 mb-2">Timeout de sesión (minutos)</label>
                            <input type="number" id="session_timeout" name="session_timeout" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="120">
                        </div>

                        <div>
                            <label for="max_login_attempts" class="block text-sm font-medium text-gray-900 mb-2">Intentos máximos de login</label>
                            <input type="number" id="max_login_attempts" name="max_login_attempts" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="5">
                        </div>
                    </div>
                </div>

                <!-- Configuración de mantenimiento -->
                <div>
                    <h4 class="text-md font-medium text-gray-900 mb-4">Mantenimiento</h4>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="maintenance_mode" name="maintenance_mode" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                                <label for="maintenance_mode" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Modo de mantenimiento
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="maintenance_message" class="block text-sm font-medium text-gray-900 mb-2">Mensaje de mantenimiento</label>
                            <textarea id="maintenance_message" name="maintenance_message" rows="3" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300 resize-none">El sitio está temporalmente en mantenimiento. Volveremos pronto.</textarea>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-3 pt-6">
                    <button type="button" class="inline-flex items-center px-4 py-2.5 border border-gray-200 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </button>
                    <button type="submit" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Panel de estadísticas del sistema -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Estadísticas del Sistema</h3>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Estado del Sistema</p>
                            <p class="text-lg font-semibold text-green-600">Operativo</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Uso de CPU</p>
                            <p class="text-lg font-semibold text-gray-900">23%</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Memoria</p>
                            <p class="text-lg font-semibold text-gray-900">1.2GB</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Almacenamiento</p>
                            <p class="text-lg font-semibold text-gray-900">45%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
