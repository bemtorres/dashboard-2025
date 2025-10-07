{{-- Tabla simple de usuarios --}}

<div class="overflow-hidden rounded-lg">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            {{-- Header de la tabla --}}
            <thead class="bg-primary border-b border-primary">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-primary">
                        Nombre
                    </th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-primary">
                        Apellido
                    </th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-primary">
                        Correo
                    </th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-primary">
                        Estado
                    </th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-primary">
                        Fecha Creación
                    </th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-primary">
                        Acciones
                    </th>
                </tr>
            </thead>

            {{-- Cuerpo de la tabla --}}
            <tbody class="bg-primary ">
                @forelse($users as $user)
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors duration-200 border-b border-primary">
                    {{-- Nombre --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-primary">
                            {{ $user->name ?? 'N/A' }}
                        </div>
                    </td>

                    {{-- Apellido --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-primary">
                            {{ $user->last_name ?? 'N/A' }}
                        </div>
                    </td>

                    {{-- Correo --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-secondary">
                            {{ $user->email }}
                        </div>
                    </td>

                    {{-- Estado --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user->email_verified_at)
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-success-100 text-success-800">
                                Activo
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-error-100 text-error-800">
                                Inactivo
                            </span>
                        @endif
                    </td>

                    {{-- Fecha de creación --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-secondary">
                            {{ $user->created_at->format('d/m/Y') }}
                        </div>
                    </td>

                    {{-- Acciones --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-2">
                            {{-- Botón Editar --}}
                            <button
                                onclick="editUser({{ $user->id }})"
                                class="text-tertiary hover:text-primary cursor-pointer transition-colors duration-200 p-1 rounded-md hover:bg-secondary"
                                title="Editar usuario"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>

                            {{-- Botón Eliminar --}}
                            @if($user->id !== auth()->id())
                            <button
                                onclick="deleteUser({{ $user->id }})"
                                class="text-tertiary hover:text-error-600 cursor-pointer transition-colors duration-200 p-1 rounded-md hover:bg-error-50"
                                title="Eliminar usuario"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-primary mb-2">No hay usuarios registrados</h3>
                            <p class="text-sm text-secondary mb-4">Comienza agregando tu primer usuario</p>
                            <button
                                onclick="openCreateUserModal()"
                                class="btn-primary text-sm px-4 py-2"
                            >
                                Agregar Usuario
                            </button>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación simple --}}
    @if($users->hasPages())
    <div class="bg-secondary px-6 py-4 border-t border-primary">
        <div class="flex items-center justify-between">
            <div class="text-sm text-secondary">
                Mostrando {{ $users->firstItem() }} a {{ $users->lastItem() }} de {{ $users->total() }} resultados
            </div>
            <div class="flex items-center space-x-2">
                {{-- Botón Anterior --}}
                @if($users->onFirstPage())
                    <span class="px-3 py-1 text-sm text-tertiary bg-secondary rounded-md cursor-not-allowed">
                        Anterior
                    </span>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 text-sm text-primary bg-primary hover:bg-secondary rounded-md transition-colors duration-200 border border-primary">
                        Anterior
                    </a>
                @endif

                {{-- Botón Siguiente --}}
                @if($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 text-sm text-primary bg-primary hover:bg-secondary rounded-md transition-colors duration-200 border border-primary">
                        Siguiente
                    </a>
                @else
                    <span class="px-3 py-1 text-sm text-tertiary bg-secondary rounded-md cursor-not-allowed">
                        Siguiente
                    </span>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>

{{-- JavaScript para las acciones --}}
<script>
function editUser(userId) {
    // Redirigir a la página de edición
    window.location.href = `{{ route('admin.users.index') }}/${userId}/edit`;
}

function deleteUser(userId) {
    if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
        // Crear formulario para eliminar
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `{{ route('admin.users.index') }}/${userId}`;

        // Agregar token CSRF
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';

        // Agregar método DELETE
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';

        form.appendChild(csrfToken);
        form.appendChild(methodField);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
