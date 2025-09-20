@extends('layouts.app')

@section('title', 'Configuración')
@section('page-title', 'Configuración')

@section('content')

<div class="container mx-auto p-8">
  <h1 class="text-3xl font-bold mb-8" style="color: var(--text-primary);">Test de Sistemas de Notificación</h1>

  <!-- Sección de Toast -->
  <div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--text-primary);">🍞 Sistema de Toast</h2>
    <div class="flex flex-wrap gap-3 mb-6">
    <button
        onclick="toggleTheme()"
        class="px-4 py-2 rounded-lg font-medium transition-colors duration-200"
        style="background-color: var(--primary-500); color: var(--text-on-primary, white);"
    >
        Cambiar Tema
    </button>

    <button
        onclick="toast.success('¡Operación exitosa!')"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #10b981;"
    >
        Success Toast
    </button>

    <button
        onclick="toast.info('Información importante')"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #3b82f6;"
    >
        Info Toast
    </button>

    <button
        onclick="toast.info('', 3000, 'Título personalizado')"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #3b82f6;"
    >
        Info Toast con Título
    </button>

    <button
        onclick="toast.warning('¡Cuidado!')"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #f59e0b;"
    >
        Warning Toast
    </button>

    <button
        onclick="toast.black('¡Negro!')"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #212121;"
    >
        Black Toast
    </button>

    <button
        onclick="toast.error('¡Error crítico!')"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #ef4444;"
    >
        Error Toast
    </button>

    <button
        onclick="testToast()"
        class="px-4 py-2 rounded-lg font-medium text-white"
        style="background-color: #8b5cf6;"
    >
        Test Toast
    </button>
    </div>
  </div>

  <!-- Sección de Swoaler -->
  <div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--text-primary);">🎭 Sistema de Swoaler</h2>
    <div class="flex flex-wrap gap-3 mb-6">
      <button
          onclick="swoaler.success('¡Éxito!', 'Operación completada correctamente')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #10b981;"
      >
          Success Modal
      </button>

      <button
          onclick="swoaler.error('Error', 'Algo salió mal en el proceso')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #ef4444;"
      >
          Error Modal
      </button>

      <button
          onclick="swoaler.warning('Advertencia', 'Ten cuidado con esta acción')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #f59e0b;"
      >
          Warning Modal
      </button>

      <button
          onclick="swoaler.info('Información', 'Aquí tienes información importante')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #3b82f6;"
      >
          Info Modal
      </button>

      <button
          onclick="swoaler.question('¿Estás seguro?', 'Esta acción no se puede deshacer')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #8b5cf6;"
      >
          Question Modal
      </button>

      <button
          onclick="swoaler.confirm('¿Eliminar elemento?', 'Esta acción es irreversible', (confirmed) => { if(confirmed) toast.success('Elemento eliminado'); else toast.info('Operación cancelada'); })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #dc2626;"
      >
          Confirm Modal
      </button>

      <button
          onclick="swoaler.success('Solo Título', '')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #059669;"
      >
          Solo Título
      </button>

      <button
          onclick="swoaler.info('', 'Solo mensaje sin título')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #2563eb;"
      >
          Solo Mensaje
      </button>

      <button
          onclick="testSwoaler()"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #7c3aed;"
      >
          Test Swoaler
      </button>
    </div>
  </div>

  <!-- Sección de Swoaler con Temporizador -->
  <div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--text-primary);">⏰ Swoaler con Temporizador</h2>
    <div class="flex flex-wrap gap-3 mb-6">
      <button
          onclick="swoaler.success('¡Éxito!', 'Este modal se cerrará automáticamente en 5 segundos', { timer: 5000 })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #10b981;"
      >
          Success con Timer (5s)
      </button>

      <button
          onclick="swoaler.warning('Advertencia', 'Este modal se cerrará en 3 segundos', { timer: 3000 })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #f59e0b;"
      >
          Warning con Timer (3s)
      </button>

      <button
          onclick="swoaler.info('Información', 'Modal con temporizador de 7 segundos', { timer: 7000 })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #3b82f6;"
      >
          Info con Timer (7s)
      </button>

      <button
          onclick="swoaler.error('Error', 'Este error se cerrará en 4 segundos', { timer: 4000 })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #ef4444;"
      >
          Error con Timer (4s)
      </button>

      <button
          onclick="swoaler.confirm('¿Confirmar?', 'Este modal se cerrará automáticamente en 6 segundos', (confirmed) => {
            if (confirmed) {
              toast.success('Confirmado');
            } else {
              toast.info('Cancelado');
            }
          }, { timer: 6000, showCancel: true })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #8b5cf6;"
      >
          Confirm con Timer (6s)
      </button>

      <button
          onclick="swoaler.choose('Selecciona rápido', 'Tienes 8 segundos para elegir', [
            { text: 'Opción 1', class: 'swoaler-btn-success', action: () => toast.success('Opción 1 seleccionada') },
            { text: 'Opción 2', class: 'swoaler-btn-primary', action: () => toast.info('Opción 2 seleccionada') },
            { text: 'Opción 3', class: 'swoaler-btn-danger', action: () => toast.warning('Opción 3 seleccionada') }
          ], { timer: 8000 })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #7c3aed;"
      >
          Choose con Timer (8s)
      </button>

      <button
          onclick="swoaler.success('Sin Timer', 'Este modal NO tiene temporizador, solo se cierra con el botón')"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #059669;"
      >
          Sin Temporizador
      </button>

      <button
          onclick="swoaler.info('Timer Largo', 'Este modal durará 10 segundos', { timer: 10000 })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #2563eb;"
      >
          Timer Largo (10s)
      </button>
    </div>
  </div>

  <!-- Sección de Swoaler con Barra de Progreso -->
  <div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--text-primary);">📊 Swoaler con Barra de Progreso</h2>
    <div class="flex flex-wrap gap-3 mb-6">
      <button
          onclick="swoaler.success('¡Éxito!', 'Modal con barra de progreso de 5 segundos', { timer: 5000, timerType: 'progress' })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #10b981;"
      >
          Success con Barra (5s)
      </button>

      <button
          onclick="swoaler.warning('Advertencia', 'Barra de progreso de 4 segundos', { timer: 4000, timerType: 'progress' })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #f59e0b;"
      >
          Warning con Barra (4s)
      </button>

      <button
          onclick="swoaler.info('Información', 'Modal con barra de progreso de 6 segundos', { timer: 6000, timerType: 'progress' })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #3b82f6;"
      >
          Info con Barra (6s)
      </button>

      <button
          onclick="swoaler.error('Error', 'Barra de progreso de 3 segundos', { timer: 3000, timerType: 'progress' })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #ef4444;"
      >
          Error con Barra (3s)
      </button>

      <button
          onclick="swoaler.confirm('¿Confirmar?', 'Barra de progreso de 7 segundos', (confirmed) => {
            if (confirmed) {
              toast.success('Confirmado');
            } else {
              toast.info('Cancelado');
            }
          }, { timer: 7000, timerType: 'progress', showCancel: true })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #8b5cf6;"
      >
          Confirm con Barra (7s)
      </button>

      <button
          onclick="swoaler.info('Test Barra', 'Esta barra de progreso debería ser visible y moverse de derecha a izquierda', { timer: 8000, timerType: 'progress' })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #dc2626;"
      >
          Test Barra Visible (8s)
      </button>
    </div>
  </div>

  <!-- Sección de Swoaler sin Botones -->
  <div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--text-primary);">🚫 Swoaler sin Botones</h2>
    <div class="flex flex-wrap gap-3 mb-6">
      <button
          onclick="swoaler.success('¡Éxito!', 'Este modal no tiene botones, solo se cierra con el temporizador', { timer: 5000, showButtons: false })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #10b981;"
      >
          Success sin Botones (5s)
      </button>

      <button
          onclick="swoaler.warning('Advertencia', 'Modal sin botones con barra de progreso', { timer: 4000, timerType: 'progress', showButtons: false })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #f59e0b;"
      >
          Warning sin Botones + Barra (4s)
      </button>

      <button
          onclick="swoaler.info('Información', 'Modal sin botones, solo se cierra con X o temporizador', { timer: 6000, showButtons: false })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #3b82f6;"
      >
          Info sin Botones (6s)
      </button>

      <button
          onclick="swoaler.error('Error', 'Modal sin botones con barra de progreso', { timer: 3000, timerType: 'progress', showButtons: false })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #ef4444;"
      >
          Error sin Botones + Barra (3s)
      </button>

      <button
          onclick="swoaler.success('Sin Botones', 'Este modal no tiene botones ni temporizador, solo se cierra con X', { showButtons: false })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #059669;"
      >
          Sin Botones ni Timer
      </button>
    </div>
  </div>

  <!-- Sección de Swoaler Avanzado -->
  <div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--text-primary);">🎭 Swoaler Avanzado - Manipulación de Acciones</h2>
    <div class="flex flex-wrap gap-3 mb-6">
      <button
          onclick="swoaler.confirmWithActions('¿Guardar cambios?', 'Los cambios se guardarán permanentemente', {
            confirmText: 'Sí, guardar',
            cancelText: 'No, cancelar',
            onConfirm: () => { toast.success('Cambios guardados correctamente'); console.log('Usuario confirmó guardar'); },
            onCancel: () => { toast.info('Operación cancelada'); console.log('Usuario canceló'); }
          })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #059669;"
      >
          Confirm con Acciones
      </button>

      <button
          onclick="swoaler.choose('¿Qué acción deseas realizar?', 'Selecciona una opción de la lista', [
            { text: 'Crear Usuario', class: 'swoaler-btn-success', action: () => { toast.success('Creando usuario...'); } },
            { text: 'Editar Perfil', class: 'swoaler-btn-primary', action: () => { toast.info('Editando perfil...'); } },
            { text: 'Eliminar Cuenta', class: 'swoaler-btn-danger', action: () => { toast.warning('Eliminando cuenta...'); } }
          ], {
            callback: (choice, index) => { console.log('Opción seleccionada:', choice.text, 'Índice:', index); }
          })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #7c3aed;"
      >
          Múltiples Opciones
      </button>

      <button
          onclick="swoaler.confirm('¿Eliminar elemento?', 'Esta acción no se puede deshacer', (confirmed) => {
            if (confirmed) {
              toast.success('Elemento eliminado');
              // Aquí podrías hacer una petición AJAX para eliminar
              console.log('Eliminando elemento...');
            } else {
              toast.info('Operación cancelada');
              console.log('Eliminación cancelada');
            }
          }, {
            confirmText: 'Sí, eliminar',
            cancelText: 'Cancelar'
          })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #dc2626;"
      >
          Eliminar con Callback
      </button>

      <button
          onclick="swoaler.choose('Selecciona el tema', '¿Qué tema prefieres?', [
            { text: '🌞 Claro', class: 'swoaler-btn-primary', action: () => {
              document.documentElement.setAttribute('data-theme', 'light');
              toast.success('Tema cambiado a claro');
            }},
            { text: '🌙 Oscuro', class: 'swoaler-btn-secondary', action: () => {
              document.documentElement.setAttribute('data-theme', 'dark');
              toast.success('Tema cambiado a oscuro');
            }},
            { text: '🎨 Automático', class: 'swoaler-btn-success', action: () => {
              document.documentElement.setAttribute('data-theme', 'auto');
              toast.success('Tema cambiado a automático');
            }}
          ])"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #f59e0b;"
      >
          Selector de Tema
      </button>

      <button
          onclick="swoaler.confirmWithActions('¿Reiniciar sistema?', 'Esto reiniciará todos los servicios', {
            confirmText: 'Sí, reiniciar',
            cancelText: 'No, mantener',
            onConfirm: () => {
              toast.warning('Reiniciando sistema...');
              setTimeout(() => toast.success('Sistema reiniciado'), 2000);
            },
            onCancel: () => {
              toast.info('Reinicio cancelado');
            }
          })"
          class="px-4 py-2 rounded-lg font-medium text-white"
          style="background-color: #f97316;"
      >
          Reiniciar Sistema
      </button>
    </div>
  </div>

  <!-- Información del tema -->
  <div class="mt-8 p-4 rounded-lg" style="background-color: var(--bg-primary); border: 1px solid var(--border-primary);">
      <h2 class="text-xl font-semibold mb-4" style="color: var(--text-primary);">Estado del Tema</h2>
      <div class="space-y-2">
          <p style="color: var(--text-secondary);">Tema actual: <span id="current-theme" class="font-mono" style="color: var(--text-primary);"></span></p>
          <p style="color: var(--text-secondary);">Fondo del body: <span id="body-bg" class="font-mono" style="color: var(--text-primary);"></span></p>
          <p style="color: var(--text-secondary);">Color del texto: <span id="text-color" class="font-mono" style="color: var(--text-primary);"></span></p>
      </div>
  </div>

  <!-- Elementos de prueba -->
  <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="p-4 rounded-lg" style="background-color: var(--bg-primary); border: 1px solid var(--border-primary);">
          <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);">Card de Prueba</h3>
          <p style="color: var(--text-secondary);">Este es un texto de prueba para verificar los colores.</p>
          <button class="mt-2 px-4 py-2 rounded-lg text-white font-medium" style="background-color: var(--primary-500);">Botón Primario</button>
      </div>

      <div class="p-4 rounded-lg" style="background-color: var(--bg-primary); border: 1px solid var(--border-primary);">
          <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary);">Otro Card</h3>
          <p style="color: var(--text-secondary);">Más contenido para probar el contraste.</p>
          <button class="mt-2 px-4 py-2 rounded-lg font-medium" style="background-color: var(--bg-primary); color: var(--text-primary); border: 1px solid var(--border-primary);">Botón Secundario</button>
      </div>
  </div>
</div>


<div class="space-y-6">
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Configuración General</h3>

            <form class="space-y-6">
                <!-- Información del sitio -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Información del Sitio</h4>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="site_name" class="block text-sm font-medium text-gray-900 mb-2">Nombre del sitio</label>
                            <input type="text" id="site_name" name="site_name" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="Mi Aplicación">
                        </div>

                        <div>
                            <label for="site_email" class="block text-sm font-medium text-gray-900 mb-2">Email de contacto</label>
                            <input type="email" id="site_email" name="site_email" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="contacto@miaplicacion.com">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="site_description" class="block text-sm font-medium text-gray-900 mb-2">Descripción del sitio</label>
                            <textarea id="site_description" name="site_description" rows="3" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300 resize-none">Una aplicación increíble construida con Laravel y Tailwind CSS</textarea>
                        </div>
                    </div>
                </div>

                <!-- Configuración de usuarios -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Configuración de Usuarios</h4>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="allow_registration" name="allow_registration" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200" checked>
                                <label for="allow_registration" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Permitir registro de nuevos usuarios
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="email_verification" name="email_verification" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200" checked>
                                <label for="email_verification" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Requerir verificación de email
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="two_factor_auth" name="two_factor_auth" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                                <label for="two_factor_auth" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Habilitar autenticación de dos factores
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configuración de notificaciones -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Notificaciones</h4>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="email_notifications" name="email_notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200" checked>
                                <label for="email_notifications" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Notificaciones por email
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="push_notifications" name="push_notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                                <label for="push_notifications" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Notificaciones push
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="notification_email" class="block text-sm font-medium text-gray-900 mb-2">Email para notificaciones</label>
                            <input type="email" id="notification_email" name="notification_email" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="admin@miaplicacion.com">
                        </div>
                    </div>
                </div>

                <!-- Configuración de seguridad -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-md font-medium text-gray-900 mb-4">Seguridad</h4>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="session_timeout" class="block text-sm font-medium text-gray-900 mb-2">Timeout de sesión (minutos)</label>
                            <input type="number" id="session_timeout" name="session_timeout" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="120">
                        </div>

                        <div>
                            <label for="max_login_attempts" class="block text-sm font-medium text-gray-900 mb-2">Intentos máximos de login</label>
                            <input type="number" id="max_login_attempts" name="max_login_attempts" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300" value="5">
                        </div>
                    </div>
                </div>

                <!-- Configuración de mantenimiento -->
                <div>
                    <h4 class="text-md font-medium text-gray-900 mb-4">Mantenimiento</h4>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="relative flex items-center">
                                <input id="maintenance_mode" name="maintenance_mode" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-colors duration-200">
                                <label for="maintenance_mode" class="ml-3 block text-sm text-gray-900 cursor-pointer">
                                    Modo de mantenimiento
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="maintenance_message" class="block text-sm font-medium text-gray-900 mb-2">Mensaje de mantenimiento</label>
                            <textarea id="maintenance_message" name="maintenance_message" rows="3" class="block w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 bg-white hover:border-gray-300 resize-none">El sitio está temporalmente en mantenimiento. Volveremos pronto.</textarea>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-3 pt-6">
                    <button type="button" class="inline-flex items-center px-4 py-2.5 border border-gray-200 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </button>
                    <button type="submit" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Panel de estadísticas del sistema -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Estadísticas del Sistema</h3>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Estado del Sistema</p>
                            <p class="text-lg font-semibold text-green-600">Operativo</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Uso de CPU</p>
                            <p class="text-lg font-semibold text-gray-900">23%</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Memoria</p>
                            <p class="text-lg font-semibold text-gray-900">1.2GB</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Almacenamiento</p>
                            <p class="text-lg font-semibold text-gray-900">45%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
