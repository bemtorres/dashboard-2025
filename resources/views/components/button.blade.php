{{-- Componente Button Reutilizable --}}
@props([
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, danger, success, warning, info, ghost
    'size' => 'md', // sm, md, lg
    'disabled' => false,
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'left', // left, right
    'class' => '',
    'href' => null,
    'target' => null
])

@php
    // Clases base
    $baseClasses = 'inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 disabled:opacity-50 disabled:cursor-not-allowed';

    // Variantes
    $variantClasses = [
        'primary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-400 shadow-lg hover:shadow-xl',
        'secondary' => 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 hover:border-gray-400 focus:ring-gray-400',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-400 shadow-lg hover:shadow-xl',
        'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-400 shadow-lg hover:shadow-xl',
        'warning' => 'bg-yellow-600 text-white hover:bg-yellow-700 focus:ring-yellow-400 shadow-lg hover:shadow-xl',
        'info' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-400 shadow-lg hover:shadow-xl',
        'ghost' => 'bg-transparent text-gray-700 hover:bg-gray-100 focus:ring-gray-400'
    ];

    // Tamaños
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base'
    ];

    // Verificar que las claves existan
    $variantClass = $variantClasses[$variant] ?? $variantClasses['primary'];
    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['md'];

    // Clases finales
    $finalClasses = $baseClasses . ' ' . $variantClass . ' ' . $sizeClass . ' ' . $class;

    // Clases para el icono
    $iconClasses = $size === 'sm' ? 'w-4 h-4' : ($size === 'lg' ? 'w-6 h-6' : 'w-5 h-5');
    $iconSpacing = $iconPosition === 'left' ? 'mr-2' : 'ml-2';
@endphp

@if($href)
    <a
        href="{{ $href }}"
        @if($target) target="{{ $target }}" @endif
        class="{{ $finalClasses }}"
        @if($disabled) onclick="return false;" @endif
    >
        @if($icon && $iconPosition === 'left')
            <span class="{{ $iconClasses }} {{ $iconSpacing }}">
                {!! $icon !!}
            </span>
        @endif

        @if($loading)
            <svg class="animate-spin {{ $iconClasses }} {{ $icon ? $iconSpacing : '' }}" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif

        <span>{{ $slot ?? '' }}</span>

        @if($icon && $iconPosition === 'right')
            <span class="{{ $iconClasses }} {{ $iconSpacing }}">
                {!! $icon !!}
            </span>
        @endif
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $disabled ? 'disabled' : '' }}
        class="{{ $finalClasses }}"
    >
        @if($icon && $iconPosition === 'left')
            <span class="{{ $iconClasses }} {{ $iconSpacing }}">
                {!! $icon !!}
            </span>
        @endif

        @if($loading)
            <svg class="animate-spin {{ $iconClasses }} {{ $icon ? $iconSpacing : '' }}" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif

        <span>{{ $slot ?? '' }}</span>

        @if($icon && $iconPosition === 'right')
            <span class="{{ $iconClasses }} {{ $iconSpacing }}">
                {!! $icon !!}
            </span>
        @endif
    </button>
@endif
