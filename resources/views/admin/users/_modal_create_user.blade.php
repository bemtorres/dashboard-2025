{{-- Modal para crear usuario - Partial independiente --}}
<style>
/* Variables CSS para tema dinámico */
#createUserModal {
    --modal-bg: #ffffff;
    --modal-border: #e5e7eb;
    --text-primary: #111827;
    --text-secondary: #6b7280;
    --input-bg: #ffffff;
    --input-border: #d1d5db;
    --input-text: #111827;
    --input-placeholder: #6b7280;
    --button-bg: #ffffff;
    --button-text: #374151;
    --button-border: #d1d5db;
    transition: all 0.3s ease;
}

#createUserModal.dark-theme-active {
    background-color: rgba(0, 0, 0, 0.6) !important;
}

#createUserModal.light-theme-active {
    background-color: rgba(0, 0, 0, 0.3) !important;
}

/* Aplicar variables CSS a los elementos del modal */
#createUserModal .bg-white {
    background-color: var(--modal-bg) !important;
}

#createUserModal .border-gray-200 {
    border-color: var(--modal-border) !important;
}

#createUserModal .dark\\:border-gray-700 {
    border-color: var(--modal-border) !important;
}

#createUserModal .dark\\:border-gray-600 {
    border-color: var(--modal-border) !important;
}

#createUserModal .text-gray-800 {
    color: var(--text-primary) !important;
}

#createUserModal .text-gray-600 {
    color: var(--text-secondary) !important;
}

#createUserModal .text-gray-700 {
    color: var(--text-primary) !important;
}

#createUserModal .dark\\:text-gray-200 {
    color: var(--text-primary) !important;
}

#createUserModal label {
    color: var(--text-primary) !important;
}

#createUserModal .dark\\:bg-gray-800 {
    background-color: var(--input-bg) !important;
}

#createUserModal .dark\\:border-gray-600 {
    border-color: var(--input-border) !important;
}

/* Estilos específicos para inputs */
#createUserModal input[type="text"],
#createUserModal input[type="email"],
#createUserModal input[type="password"],
#createUserModal select {
    color: var(--input-text) !important;
    background-color: var(--input-bg) !important;
    border-color: var(--input-border) !important;
}

#createUserModal input::placeholder {
    color: var(--input-placeholder) !important;
}

#createUserModal input:focus {
    color: var(--input-text) !important;
    background-color: var(--input-bg) !important;
}

/* Estilos específicos para botones */
#createUserModal button {
    background-color: var(--button-bg) !important;
    color: var(--button-text) !important;
    border-color: var(--button-border) !important;
}

#createUserModal button:hover {
    background-color: var(--button-bg) !important;
    color: var(--button-text) !important;
    opacity: 0.9;
}

/* Botón principal (Crear Usuario) - mantener azul */
#createUserModal button[type="submit"] {
    background-color: #dcdcdc !important;
    color: #ffffff !important;
    border-color: #dcdcdc !important;
}

#createUserModal button[type="submit"]:hover {
    background-color: #f6f6f6 !important;
    border-color: #f6f6f6 !important;
}

/* Estilos específicos para bordes del header */
#createUserModal .border-b {
    border-bottom-color: var(--modal-border) !important;
}

/* Eliminar bordes en modo oscuro */
#createUserModal.dark-theme-active {
    border: none !important;
}

#createUserModal.dark-theme-active .border,
#createUserModal.dark-theme-active .border-b,
#createUserModal.dark-theme-active .border-gray-200,
#createUserModal.dark-theme-active .dark\\:border-gray-700,
#createUserModal.dark-theme-active .dark\\:border-gray-600 {
    border-color: transparent !important;
}
</style>

<div id="createUserModal" class="fixed inset-0 bg-black/30 backdrop-blur-[1px] hidden z-50 items-center justify-center p-2">
    <div class="bg-white rounded-lg shadow-2xl max-w-4xl w-full max-h-[95vh] overflow-y-auto border border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <!-- Header del modal -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 dark:border-gray-600">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center dark:text-white">
                    Crear nuevo usuario
                </h3>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-300">Completa los datos para crear el nuevo usuario.</p>
            </div>
            <button type="button" onclick="closeCreateUserModal()" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Formulario -->
        <form id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="p-4 space-y-4">
            @csrf

            <!-- Nombre y Apellido -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                        Nombre <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white text-gray-900 placeholder-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                        placeholder="Nombre del usuario">
                </div>
                <div>

                    <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                        Apellido
                    </label>
                    <input type="text" id="last_name" name="last_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white text-gray-900 placeholder-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                        placeholder="Apellido del usuario">
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white text-gray-900 placeholder-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                    placeholder="email@ejemplo.com">
            </div>

            <!-- Contraseña y Confirmar Contraseña -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                        Contraseña <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white text-gray-900 placeholder-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                        placeholder="Contraseña">
                    <p class="text-xs text-gray-500 mt-1 dark:text-gray-400">Mínimo 8 caracteres</p>
                </div>
                <div>
                  <label for="is_admin" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                    Rol del usuario
                  </label>
                  <select id="is_admin" name="is_admin"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white text-gray-900 appearance-none cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                      <option value="0">Usuario</option>
                      <option value="1">Administrador</option>
                  </select>
                </div>
            </div>

            <!-- Foto -->
            <div>
                <label for="photo" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                    Foto de perfil
                </label>
                <div class="relative">
                    <input type="file" id="photo" name="photo" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 file:cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-1 dark:text-gray-400">JPG, PNG, GIF. Máximo 2MB</p>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeCreateUserModal()"
                    class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200 shadow-lg hover:shadow-xl dark:bg-gray-600 dark:hover:bg-gray-700">
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
function isDarkMode() {
    // Verificar si el tema es oscuro
    return document.documentElement.classList.contains('dark') ||
           localStorage.getItem('theme') === 'dark' ||
           (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
}

function openCreateUserModal() {
    const modal = document.getElementById('createUserModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden'; // Prevenir scroll del body

    // Aplicar tema según el estado actual
    applyThemeToModal();

    // Enfocar el primer input
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 100);
}

function applyThemeToModal() {
    const modal = document.getElementById('createUserModal');
    const isDark = isDarkMode();

    // Aplicar clases dinámicas según el tema
    if (isDark) {
        modal.classList.add('dark-theme-active');
        modal.classList.remove('light-theme-active');

        // Aplicar estilos específicos para tema oscuro
        modal.style.setProperty('--modal-bg', '#303030');
        modal.style.setProperty('--modal-border', 'transparent');
        modal.style.setProperty('--text-primary', '#dcdcdc');
        modal.style.setProperty('--text-secondary', '#dcdcdc');
        modal.style.setProperty('--input-bg', '#303030');
        modal.style.setProperty('--input-border', '#dcdcdc');
        modal.style.setProperty('--input-text', '#dcdcdc');
        modal.style.setProperty('--input-placeholder', '#a0a0a0');
        modal.style.setProperty('--button-bg', '#ededed');
        modal.style.setProperty('--button-text', '#000000');
        modal.style.setProperty('--button-border', '#dcdcdc');
    } else {
        modal.classList.add('light-theme-active');
        modal.classList.remove('dark-theme-active');

        // Aplicar estilos específicos para tema claro
        modal.style.setProperty('--modal-bg', '#ffffff');
        modal.style.setProperty('--modal-border', '#e5e7eb');
        modal.style.setProperty('--text-primary', '#111827');
        modal.style.setProperty('--text-secondary', '#6b7280');
        modal.style.setProperty('--input-bg', '#ffffff');
        modal.style.setProperty('--input-border', '#d1d5db');
        modal.style.setProperty('--input-text', '#111827');
        modal.style.setProperty('--input-placeholder', '#6b7280');
        modal.style.setProperty('--button-bg', '#ffffff');
        modal.style.setProperty('--button-text', '#374151');
        modal.style.setProperty('--button-border', '#d1d5db');
    }
}

function closeCreateUserModal() {
    const modal = document.getElementById('createUserModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
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

    if (password.length < 8) {
        e.preventDefault();
        alert('La contraseña debe tener al menos 8 caracteres');
        return false;
    }
});

// Escuchar cambios en el tema
function watchThemeChanges() {
    // Observar cambios en las clases del documento
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                const modal = document.getElementById('createUserModal');
                if (!modal.classList.contains('hidden')) {
                    applyThemeToModal();
                }
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });

    // Escuchar cambios en el localStorage
    window.addEventListener('storage', function(e) {
        if (e.key === 'theme') {
            const modal = document.getElementById('createUserModal');
            if (!modal.classList.contains('hidden')) {
                applyThemeToModal();
            }
        }
    });

    // Escuchar cambios en las preferencias del sistema
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
        const modal = document.getElementById('createUserModal');
        if (!modal.classList.contains('hidden')) {
            applyThemeToModal();
        }
    });
}

// Inicializar el observador de temas cuando se carga la página
document.addEventListener('DOMContentLoaded', function() {
    watchThemeChanges();
});
</script>
