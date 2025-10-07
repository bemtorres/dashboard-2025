@extends('layouts.app')

@section('title', 'Crear Usuario')
@section('page-title', 'Crear Usuario')

@section('content')
<x-back title="Usuarios" href="{{ route('admin.users.index') }}" ></x-back>
{{-- <div class="max-w-2xl mx-auto"> --}}
<div class="mx-auto">
    <div class="card shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="mb-6">
                <h3 class="text-lg leading-6 font-medium text-primary">Información del Usuario</h3>
                <p class="mt-1 text-sm text-secondary">Completa la información para crear un nuevo usuario.</p>
            </div>

            <form id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="p-4 space-y-4">
              @csrf

              @include('admin.users._form_create')

              <!-- Botones -->
              <div class="flex justify-start space-x-3 pt-4">
                  <button type="submit" class="modal-button-primar  btn-primary text-sm font-semibold focus:outline-none focus:ring-2">
                    Guardar
                  </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
