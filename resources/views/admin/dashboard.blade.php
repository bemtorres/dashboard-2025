@extends('layouts.skeleton')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('app')
<div class="space-y-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Gráfico de ventas -->
        <div class="card">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg leading-6 font-medium text-primary">
                        Ventas de los últimos 7 días
                    </h3>
                    <div class="flex space-x-2">
                        <x-button variant="ghost" size="xs" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'></path><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'></path>">
                            Configurar
                        </x-button>
                    </div>
                </div>
                <div class="h-64 flex items-center justify-center bg-secondary rounded-lg">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <p class="mt-2 text-sm text-secondary">Gráfico de ventas</p>
                        <p class="text-xs text-tertiary">Integrar con biblioteca de gráficos</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Productos más vendidos -->
        <div class="card">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-primary mb-4">
                    Productos más vendidos
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-tertiary rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-primary">Producto A</p>
                                <p class="text-sm text-secondary">Categoría X</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-primary">156 ventas</p>
                            <p class="text-sm text-secondary">$2,340</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-tertiary rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-primary">Producto B</p>
                                <p class="text-sm text-secondary">Categoría Y</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-primary">134 ventas</p>
                            <p class="text-sm text-secondary">$1,890</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-tertiary rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-primary">Producto C</p>
                                <p class="text-sm text-secondary">Categoría Z</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-primary">98 ventas</p>
                            <p class="text-sm text-secondary">$1,456</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Órdenes recientes -->
    <div class="card">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg leading-6 font-medium text-primary">
                    Órdenes recientes
                </h3>
                {{-- <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                    Ver todas
                </a> --}}
            </div>
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-border-primary">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                Cliente
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                Total
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                Fecha
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-primary divide-y divide-border-primary">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                                #1001
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                Juan Pérez
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-success-100 text-success-800"></span>
                                    Completada
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                $89.99
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                Hace 2 horas
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                                #1002
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                María García
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-warning-100 text-warning-800">
                                    Pendiente
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                $156.50
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                Hace 4 horas
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                                #1003
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                Carlos López
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-primary-100 text-primary-800">
                                    En proceso
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                $234.75
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                Hace 6 horas
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
