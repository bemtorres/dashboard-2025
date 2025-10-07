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

    <!-- Tests de Toast con HTML -->
    <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">
        <h3 class="text-lg font-semibold mb-3 text-gray-800 dark:text-gray-200">Tests de Toast con HTML</h3>

        <button
            onclick="console.log('Probando toastSuccessHtml...'); toastSuccessHtml('¡Éxito con <strong>HTML</strong>!');"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #10b981;"
        >
            Success con HTML
        </button>

        <button
            onclick="console.log('Probando toastErrorHtml...'); toastErrorHtml('Error con <em>formato</em>');"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #ef4444;"
        >
            Error con HTML
        </button>

        <button
            onclick="console.log('Probando toastWarningHtml...'); toastWarningHtml('Advertencia: <strong>Archivo grande</strong>');"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #f59e0b;"
        >
            Warning con HTML
        </button>

        <button
            onclick="console.log('Probando toastInfoHtml...'); toastInfoHtml('Información: <em>Nuevo usuario</em>');"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #3b82f6;"
        >
            Info con HTML
        </button>

        <button
            onclick="console.log('Probando toastHtml...'); toastHtml('black', 'Toast <strong>negro</strong>', 5000, 'Título Negro');"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #212121;"
        >
            Black con HTML
        </button>

        <button
            onclick="console.log('Probando testToastHtml...'); testToastHtml();"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #8b5cf6;"
        >
            Test HTML Completo
        </button>

        <button
            onclick="console.log('Verificando funciones...'); console.log('toastSuccessHtml:', typeof window.toastSuccessHtml); console.log('toastManager:', typeof window.toastManager);"
            class="px-4 py-2 rounded-lg font-medium text-white mr-2 mb-2"
            style="background-color: #6b7280;"
        >
            Debug Funciones
        </button>
    </div>

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

@endsection
