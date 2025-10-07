{{-- Modal para crear usuario - Versión simplificada --}}

<div id="createUserModal" class="fixed inset-0 bg-black/30 backdrop-blur-[1px] hidden z-50 items-center justify-center p-2">
    <div class="modal-content card max-w-4xl w-full max-h-[95vh] overflow-y-auto">
        <!-- Header del modal -->
        <div class="modal-header bg-secondary border-b border-primary flex items-center justify-between p-4">
            <div>
                <h3 class="modal-title text-xl font-bold text-primary flex items-center">
                    Crear nuevo usuario
                </h3>
                <p class="modal-subtitle text-sm text-secondary mt-1">Completa los datos para crear el nuevo usuario.</p>
            </div>
            <button type="button" onclick="closeCreateUserModal()" class="text-tertiary hover:text-primary transition-colors duration-200 p-1 rounded-md hover:bg-secondary">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Formulario -->
        <form id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="p-4 space-y-4">
            @csrf

            @include('admin.users._form_create')

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeCreateUserModal()"
                    class="modal-button-cancel btn-secondary text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Cancelar
                </button>
                <button type="submit"
                    class="modal-button-primary btn-primary text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JavaScript del modal movido a index.blade.php para evitar conflictos --}}
