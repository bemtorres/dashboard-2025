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
              Generar Reporte
          </button>
        </div>
    </div>

    <!-- Content -->
    <div class="card overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-primary">No hay reportes</h3>
                <p class="mt-1 text-sm text-secondary">Comienza generando un nuevo reporte.</p>
                <div class="mt-6">
                    <button type="button" class="btn-primary">
                      Generar Reporte
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
