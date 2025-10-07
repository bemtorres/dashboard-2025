{{-- Componente Select Reutilizable --}}
@props([
    'name' => '',
    'id' => '',
    'label' => '',
    'placeholder' => 'Seleccionar...',
    'value' => '',
    'options' => [],
    'required' => false,
    'disabled' => false,
    'error' => '',
    'help' => '',
    'class' => '',
    'wrapperClass' => '',
    'labelClass' => '',
    'selectClass' => '',
    'icon' => null,
    'iconPosition' => 'right' // left, right
])

@php
    $selectId = $id ?: $name;
    $selectName = $name;
    $selectValue = old($name, $value);
    $hasError = $error || $errors->has($name);

    // Clases base para el select usando el sistema de colores personalizado
    $baseSelectClasses = 'input w-full px-3 py-2.5 text-sm appearance-none cursor-pointer text-primary bg-primary';

    // Clases de estado
    $stateClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';

    // Clases finales
    $finalSelectClasses = $baseSelectClasses . ' ' . $stateClasses . ' ' . $selectClass;

    // Clases para el wrapper
    $wrapperClasses = 'mb-4 ' . $wrapperClass;

    // Clases para el label
    $labelClasses = 'block text-sm font-semibold text-primary mb-2 ' . $labelClass;

    // Icono por defecto si no se proporciona uno
    $defaultIcon = $icon ?: '<svg class="h-4 w-4 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>';
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
        @if($icon && $iconPosition === 'left')
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                {!! $icon !!}
            </div>
        @endif

        <select
            id="{{ $selectId }}"
            name="{{ $selectName }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="{{ $finalSelectClasses }} {{ $icon && $iconPosition === 'left' ? 'pl-10' : '' }} {{ $icon && $iconPosition === 'right' ? 'pr-10' : '' }}"
        >
            @if($placeholder)
                <option value="" class="text-primary bg-primary" {{ $selectValue == '' ? 'selected' : '' }}>
                    {{ $placeholder }}
                </option>
            @endif

            @foreach($options as $optionValue => $optionLabel)
                <option
                    value="{{ $optionValue }}"
                    class="text-primary bg-primary"
                    {{ $selectValue == $optionValue ? 'selected' : '' }}
                >
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>

        @if($icon && $iconPosition === 'right')
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                {!! $icon !!}
            </div>
        @elseif(!$icon)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                {!! $defaultIcon !!}
            </div>
        @endif
    </div>

    @if($hasError)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
            {{ $error ?: $errors->first($name) }}
        </p>
    @endif

    @if($help && !$hasError)
        <p class="mt-1 text-sm text-secondary">
            {{ $help }}
        </p>
    @endif
</div>
