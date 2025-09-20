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
            Nuevo Contenido
          </button>
        </div>
    </div>

    <!-- Content -->
    <div class="card overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-primary">No hay contenidos</h3>
                <p class="mt-1 text-sm text-secondary">Comienza creando un nuevo contenido.</p>
                <div class="mt-6">
                  <button type="button" class="btn-primary">
                    Nuevo Contenido
                  </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
