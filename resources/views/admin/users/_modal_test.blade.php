{{-- Modal de prueba simple --}}
<div id="testModal" class="fixed inset-0 bg-black/30 backdrop-blur-[1px] hidden z-50 items-center justify-center p-2">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full max-h-[95vh] overflow-y-auto border border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <!-- Header del modal -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 dark:border-gray-600">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center dark:text-white">
                    Modal de Prueba
                </h3>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-300">Prueba del sistema de componentes</p>
            </div>
            <button type="button" onclick="closeModal('testModal')" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Contenido del modal -->
        <div class="p-4">
            <form>
                <div class="mb-4">
                    <label for="testInput" class="block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200">
                        Campo de Prueba
                    </label>
                    <input
                        type="text"
                        id="testInput"
                        name="testInput"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 bg-white text-gray-900 placeholder-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                        placeholder="Escribe algo aquí"
                    >
                </div>

                <div class="flex justify-end space-x-3">
                    <button
                        type="button"
                        onclick="closeModal('testModal')"
                        class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    >
                        Cancelar
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 text-sm font-semibold text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200 shadow-lg hover:shadow-xl"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
}
</script>
