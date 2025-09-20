{{-- Modal para crear usuario - Partial independiente --}}
<div id="createUserModal" class="fixed inset-0 bg-secondary/30 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
    <div class="bg-primary rounded-lg shadow-2xl max-w-md w-full max-h-[80vh] overflow-y-auto border border-border-primary/20">
        <!-- Header del modal -->
        <div class="flex items-center justify-between p-6 border-b border-border-primary/30 bg-gradient-to-r from-primary-50/50 to-secondary-50/50">
            <div>
                <h3 class="text-xl font-bold text-primary flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Crear nuevo usuario
                </h3>
                <p class="text-sm text-secondary mt-1">Completa los datos para crear el nuevo usuario.</p>
            </div>
            <button type="button" onclick="closeCreateUserModal()" class="text-tertiary hover:text-primary transition-colors duration-200 p-1 rounded-md hover:bg-secondary/50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Formulario -->
        <form id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf

            <!-- Nombre y Apellido -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-semibold text-primary mb-2">
                        Nombre <span class="text-error-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary placeholder-tertiary"
                        placeholder="Nombre del usuario">
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-semibold text-primary mb-2">
                        Apellido
                    </label>
                    <input type="text" id="last_name" name="last_name"
                        class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary placeholder-tertiary"
                        placeholder="Apellido del usuario">
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-primary mb-2">
                    Email <span class="text-error-500">*</span>
                </label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary placeholder-tertiary"
                    placeholder="email@ejemplo.com">
            </div>

            <!-- Contraseña y Confirmar Contraseña -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-semibold text-primary mb-2">
                        Contraseña <span class="text-error-500">*</span>
                    </label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary placeholder-tertiary"
                        placeholder="Contraseña inicial">
                    <p class="text-xs text-secondary mt-1">Mínimo 8 caracteres</p>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-primary mb-2">
                        Confirmar <span class="text-error-500">*</span>
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary placeholder-tertiary"
                        placeholder="Confirmar contraseña">
                </div>
            </div>

            <!-- Rol -->
            <div>
                <label for="is_admin" class="block text-sm font-semibold text-primary mb-2">
                    Rol del usuario
                </label>
                <select id="is_admin" name="is_admin"
                    class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary appearance-none cursor-pointer">
                    <option value="0">Usuario</option>
                    <option value="1">Administrador</option>
                </select>
            </div>

            <!-- Foto -->
            <div>
                <label for="photo" class="block text-sm font-semibold text-primary mb-2">
                    Foto de perfil
                </label>
                <div class="relative">
                    <input type="file" id="photo" name="photo" accept="image/*"
                        class="w-full px-4 py-3 border border-border-primary rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 bg-primary hover:border-tertiary file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-secondary file:text-primary hover:file:bg-tertiary file:cursor-pointer">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-secondary mt-1">JPG, PNG, GIF. Máximo 2MB</p>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-border-primary/30">
                <button type="button" onclick="closeCreateUserModal()"
                    class="px-6 py-3 text-sm font-semibold text-primary bg-primary border border-border-primary rounded-lg hover:bg-secondary transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-6 py-3 text-sm font-semibold text-white bg-primary-500 rounded-lg hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Funciones para el modal de crear usuario
function openCreateUserModal() {
    const modal = document.getElementById('createUserModal');
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevenir scroll del body

    // Enfocar el primer input
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 100);
}

function closeCreateUserModal() {
    const modal = document.getElementById('createUserModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto'; // Restaurar scroll del body

    // Limpiar el formulario
    document.getElementById('createUserForm').reset();
}

// Cerrar modal al hacer clic fuera
document.getElementById('createUserModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCreateUserModal();
    }
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('createUserModal');
        if (!modal.classList.contains('hidden')) {
            closeCreateUserModal();
        }
    }
});

// Validación del formulario
document.getElementById('createUserForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;

    if (password !== passwordConfirmation) {
        e.preventDefault();
        alert('Las contraseñas no coinciden');
        return false;
    }

    if (password.length < 8) {
        e.preventDefault();
        alert('La contraseña debe tener al menos 8 caracteres');
        return false;
    }
});
</script>
