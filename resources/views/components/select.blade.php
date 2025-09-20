{{-- Componente Select Reutilizable --}}
@props([
    'name' => '',
    'id' => '',
    'label' => '',
    'options' => [],
    'value' => '',
    'placeholder' => 'Selecciona una opción',
    'required' => false,
    'disabled' => false,
    'error' => '',
    'help' => '',
    'class' => '',
    'wrapperClass' => '',
    'labelClass' => '',
    'selectClass' => '',
    'icon' => null
])

@php
    $selectId = $id ?: $name;
    $selectName = $name;
    $selectValue = old($name, $value);
    $hasError = $error || $errors->has($name);

    // Clases base para el select
    $baseSelectClasses = 'w-full px-3 py-2 border rounded-lg text-sm transition-all duration-200 bg-white text-gray-900 appearance-none cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-white';

    // Clases de focus
    $focusClasses = 'focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400';

    // Clases de error
    $errorClasses = $hasError ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300';

    // Clases de estado
    $stateClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';

    // Clases finales
    $finalSelectClasses = $baseSelectClasses . ' ' . $focusClasses . ' ' . $errorClasses . ' ' . $stateClasses . ' ' . $selectClass;

    // Clases para el wrapper
    $wrapperClasses = 'mb-4 ' . $wrapperClass;

    // Clases para el label
    $labelClasses = 'block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200 ' . $labelClass;
@endphp

<div class="{{ $wrapperClasses }}">
    @if($label)
        <label for="{{ $selectId }}" class="{{ $labelClasses }}">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <select
            id="{{ $selectId }}"
            name="{{ $selectName }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="{{ $finalSelectClasses }}"
        >
            @if($placeholder)
                <option value="" disabled {{ $selectValue == '' ? 'selected' : '' }}>
                    {{ $placeholder }}
                </option>
            @endif

            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" {{ $selectValue == $optionValue ? 'selected' : '' }}>
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>

        <!-- Icono de flecha -->
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            @if($icon)
                {!! $icon !!}
            @else
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            @endif
        </div>
    </div>

    @if($hasError)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
            {{ $error ?: $errors->first($name) }}
        </p>
    @endif

    @if($help && !$hasError)
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ $help }}
        </p>
    @endif
</div>
