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
                Nuevo Curso
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="card overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-primary">No hay cursos</h3>
                <p class="mt-1 text-sm text-secondary">Comienza creando un nuevo curso.</p>
                <div class="mt-6">
                    <button type="button" class="btn-primary">
                      Nuevo Curso
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
