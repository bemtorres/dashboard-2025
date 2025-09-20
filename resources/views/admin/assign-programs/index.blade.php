@extends('layouts.skeleton')

@section('page-title', $title)

@section('app')
<div class="space-y-6">
    <!-- Header -->
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-primary sm:text-3xl sm:truncate">
                {{ $title }}
            </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" class="ml-3 btn-primary">
                Nueva Asignación
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="card overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-primary">No hay asignaciones</h3>
                <p class="mt-1 text-sm text-secondary">Comienza creando una nueva asignación de programa.</p>
                <div class="mt-6">
                    <button type="button" class="btn-primary">
                      Nueva Asignación
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
