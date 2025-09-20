{{-- Modal para crear usuario usando el nuevo sistema de componentes --}}
<x-modal
    id="createUserModal"
    title="Crear nuevo usuario"
    description="Completa los datos para crear el nuevo usuario"
    size="4xl"
>
    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Nombre y Apellido -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input
                name="name"
                label="Nombre"
                placeholder="Nombre del usuario"
                required
            />
            <x-input
                name="last_name"
                label="Apellido"
                placeholder="Apellido del usuario"
            />
        </div>

        <!-- Email -->
        <x-input
            name="email"
            label="Email"
            type="email"
            placeholder="email@ejemplo.com"
            required
        />

        <!-- Contraseña y Rol -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input
                name="password"
                label="Contraseña"
                type="password"
                placeholder="Contraseña"
                help="Mínimo 8 caracteres"
                required
            />
            <x-select
                name="is_admin"
                label="Rol del usuario"
                :options="['0' => 'Usuario', '1' => 'Administrador']"
            />
        </div>

        <!-- Foto -->
        <x-input
            name="photo"
            label="Foto de perfil"
            type="file"
            help="JPG, PNG, GIF. Máximo 2MB"
            icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>'
        />

        <!-- Botones -->
        <div class="flex justify-end space-x-3 pt-4">
            <x-button
                variant="secondary"
                onclick="closeModal('createUserModal')"
            >
                Cancelar
            </x-button>
            <x-button
                type="submit"
                variant="primary"
                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>'
            >
                Crear Usuario
            </x-button>
        </div>
    </form>
</x-modal>

<script>
// Validación del formulario
document.getElementById('createUserForm')?.addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;

    if (password.length < 8) {
        e.preventDefault();
        alert('La contraseña debe tener al menos 8 caracteres');
        return false;
    }
});
</script>
