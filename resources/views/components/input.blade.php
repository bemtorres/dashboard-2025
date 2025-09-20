{{-- Componente Input Reutilizable --}}
@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'label' => '',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'error' => '',
    'help' => '',
    'class' => '',
    'wrapperClass' => '',
    'labelClass' => '',
    'inputClass' => '',
    'icon' => null,
    'iconPosition' => 'right' // left, right
])

@php
    $inputId = $id ?: $name;
    $inputName = $name;
    $inputValue = old($name, $value);
    $hasError = $error || $errors->has($name);

    // Clases base para el input
    $baseInputClasses = 'w-full px-3 py-2 border rounded-lg text-sm transition-all duration-200 bg-white text-gray-900 placeholder-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400';

    // Clases de focus
    $focusClasses = 'focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400';

    // Clases de error
    $errorClasses = $hasError ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300';

    // Clases de estado
    $stateClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
    $stateClasses .= $readonly ? ' bg-gray-50 dark:bg-gray-700' : '';

    // Clases finales
    $finalInputClasses = $baseInputClasses . ' ' . $focusClasses . ' ' . $errorClasses . ' ' . $stateClasses . ' ' . $inputClass;

    // Clases para el wrapper
    $wrapperClasses = 'mb-4 ' . $wrapperClass;

    // Clases para el label
    $labelClasses = 'block text-sm font-semibold text-gray-700 mb-2 dark:text-gray-200 ' . $labelClass;
@endphp

<div class="{{ $wrapperClasses }}">
    @if($label)
        <label for="{{ $inputId }}" class="{{ $labelClasses }}">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        @if($icon && $iconPosition === 'left')
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                {!! $icon !!}
            </div>
            <input
                type="{{ $type }}"
                id="{{ $inputId }}"
                name="{{ $inputName }}"
                value="{{ $inputValue }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $readonly ? 'readonly' : '' }}
                class="{{ $finalInputClasses }} {{ $icon ? 'pl-10' : '' }}"
            >
        @else
            <input
                type="{{ $type }}"
                id="{{ $inputId }}"
                name="{{ $inputName }}"
                value="{{ $inputValue }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $readonly ? 'readonly' : '' }}
                class="{{ $finalInputClasses }} {{ $icon ? 'pr-10' : '' }}"
            >
            @if($icon && $iconPosition === 'right')
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    {!! $icon !!}
                </div>
            @endif
        @endif
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
