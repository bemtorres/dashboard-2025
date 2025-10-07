 <!-- Nombre y Apellido -->
 <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
  <div>
      <label for="name" class="modal-label block text-sm font-semibold text-primary mb-2">
          Nombre <span class="text-red-500">*</span>
      </label>
      <input type="text" id="name" name="name" required
          class="modal-input input w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
          placeholder="Nombre del usuario">
  </div>
  <div>

      <label for="last_name" class="modal-label block text-sm font-semibold text-primary mb-2">
          Apellido
      </label>
      <input type="text" id="last_name" name="last_name"
          class="modal-input input w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
          placeholder="Apellido del usuario">
  </div>
</div>

<!-- Email -->
<div>
  <label for="email" class="modal-label block text-sm font-semibold text-primary mb-2">
      Email <span class="text-red-500">*</span>
  </label>
  <input type="email" id="email" name="email" required
      class="modal-input input w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
      placeholder="email@ejemplo.com">
</div>

<!-- Contraseña y Confirmar Contraseña -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
  <div>
      <label for="password" class="modal-label block text-sm font-semibold text-primary mb-2">
          Contraseña <span class="text-red-500">*</span>
      </label>
      <input type="password" id="password" name="password" required
          class="modal-input input w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
          placeholder="Contraseña">
      <p class="text-xs text-gray-500 mt-1 dark:text-gray-400">Mínimo 8 caracteres</p>
  </div>
  <div>
    <label for="is_admin" class="modal-label block text-sm font-semibold text-primary mb-2">
      Rol del usuario
    </label>
    <select id="is_admin" name="is_admin"
        class="modal-input input w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none cursor-pointer">
        <option value="0">Usuario</option>
        <option value="1">Administrador</option>
    </select>
  </div>
</div>

<!-- Foto -->
<div>
  <label for="photo" class="modal-label block text-sm font-semibold text-primary mb-2">
      Foto de perfil
  </label>
  <div class="relative">
      <input type="file" id="photo" name="photo" accept="image/*"
          class="modal-input input w-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-200 dark:hover:file:bg-gray-600 file:cursor-pointer">
      <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
          <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
      </div>
  </div>
  <p class="text-xs text-gray-500 mt-1 dark:text-gray-400">JPG, PNG, GIF. Máximo 2MB</p>
</div>
