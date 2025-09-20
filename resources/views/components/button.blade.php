@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false,
    'href' => null,
    'target' => null,
    'icon' => null,
    'iconPosition' => 'left',
    'loading' => false,
    'class' => ''
])

@php
    // Variantes de botón - Adaptadas para modo dark
    $variants = [
        'primary' => 'text-white focus:ring-primary-500',
        'secondary' => 'text-white focus:ring-secondary-500',
        'success' => 'text-white focus:ring-success-500',
        'error' => 'text-white focus:ring-error-500',
        'warning' => 'text-white focus:ring-warning-500',
        'outline' => 'border focus:ring-primary-500',
        'ghost' => 'focus:ring-primary-500',
        'link' => 'underline focus:ring-primary-500'
    ];

    // Tamaños de botón
    $sizes = [
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
        'xl' => 'px-8 py-4 text-lg'
    ];

    // Clases base
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed';

    // Clases de variante
    $variantClasses = $variants[$variant] ?? $variants['primary'];

    // Clases de tamaño
    $sizeClasses = $sizes[$size] ?? $sizes['md'];

    // Clases de icono
    $iconClasses = $iconPosition === 'left' ? 'mr-2' : 'ml-2';
    $iconSize = match($size) {
        'xs' => 'w-3 h-3',
        'sm' => 'w-4 h-4',
        'md' => 'w-4 h-4',
        'lg' => 'w-5 h-5',
        'xl' => 'w-6 h-6',
        default => 'w-4 h-4'
    };

    // Clases finales
    $classes = $baseClasses . ' ' . $variantClasses . ' ' . $sizeClasses . ' ' . $class;

    // Determinar si es un enlace o botón
    $isLink = !is_null($href);
    $tag = $isLink ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($isLink)
        href="{{ $href }}"
        @if($target) target="{{ $target }}" @endif
    @else
        type="{{ $type }}"
        @if($disabled) disabled @endif
    @endif
    @php
        // Estilos inline para modo dark
        $inlineStyles = '';
        switch($variant) {
            case 'primary':
                $inlineStyles = 'background-color: var(--primary-500);';
                $inlineStyles .= ' border: 1px solid var(--primary-500);';
                $inlineStyles .= ' color: white;';
                break;
            case 'secondary':
                $inlineStyles = 'background-color: var(--secondary-500);';
                $inlineStyles .= ' border: 1px solid var(--secondary-500);';
                $inlineStyles .= ' color: white;';
                break;
            case 'success':
                $inlineStyles = 'background-color: var(--success-500);';
                $inlineStyles .= ' border: 1px solid var(--success-500);';
                $inlineStyles .= ' color: white;';
                break;
            case 'error':
                $inlineStyles = 'background-color: var(--error-500);';
                $inlineStyles .= ' border: 1px solid var(--error-500);';
                $inlineStyles .= ' color: white;';
                break;
            case 'warning':
                $inlineStyles = 'background-color: var(--warning-500);';
                $inlineStyles .= ' border: 1px solid var(--warning-500);';
                $inlineStyles .= ' color: white;';
                break;
            case 'outline':
                $inlineStyles = 'background-color: transparent;';
                $inlineStyles .= ' border: 1px solid var(--primary-500);';
                $inlineStyles .= ' color: var(--primary-500);';
                break;
            case 'ghost':
                $inlineStyles = 'background-color: transparent;';
                $inlineStyles .= ' border: 1px solid transparent;';
                $inlineStyles .= ' color: var(--primary-500);';
                break;
            case 'link':
                $inlineStyles = 'background-color: transparent;';
                $inlineStyles .= ' border: none;';
                $inlineStyles .= ' color: var(--primary-500);';
                break;
        }

        // Hover styles
        $hoverStyles = '';
        switch($variant) {
            case 'primary':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--primary-600)\'; this.style.borderColor=\'var(--primary-600)\'" onmouseout="this.style.backgroundColor=\'var(--primary-500)\'; this.style.borderColor=\'var(--primary-500)\'"';
                break;
            case 'secondary':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--secondary-600)\'; this.style.borderColor=\'var(--secondary-600)\'" onmouseout="this.style.backgroundColor=\'var(--secondary-500)\'; this.style.borderColor=\'var(--secondary-500)\'"';
                break;
            case 'success':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--success-600)\'; this.style.borderColor=\'var(--success-600)\'" onmouseout="this.style.backgroundColor=\'var(--success-500)\'; this.style.borderColor=\'var(--success-500)\'"';
                break;
            case 'error':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--error-600)\'; this.style.borderColor=\'var(--error-600)\'" onmouseout="this.style.backgroundColor=\'var(--error-500)\'; this.style.borderColor=\'var(--error-500)\'"';
                break;
            case 'warning':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--warning-600)\'; this.style.borderColor=\'var(--warning-600)\'" onmouseout="this.style.backgroundColor=\'var(--warning-500)\'; this.style.borderColor=\'var(--warning-500)\'"';
                break;
            case 'outline':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--primary-500)\'; this.style.color=\'white\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'var(--primary-500)\'"';
                break;
            case 'ghost':
                $hoverStyles = 'onmouseover="this.style.backgroundColor=\'var(--primary-50)\'; this.style.color=\'var(--primary-600)\'" onmouseout="this.style.backgroundColor=\'transparent\'; this.style.color=\'var(--primary-500)\'"';
                break;
            case 'link':
                $hoverStyles = 'onmouseover="this.style.color=\'var(--primary-600)\'" onmouseout="this.style.color=\'var(--primary-500)\'"';
                break;
        }
    @endphp
    style="{{ $inlineStyles }}"
    {!! $hoverStyles !!}
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($loading)
        <!-- Spinner de carga -->
        <svg class="animate-spin {{ $iconSize }} mr-2" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @elseif($icon && $iconPosition === 'left')
        <!-- Icono a la izquierda -->
        <svg class="{{ $iconSize }} {{ $iconClasses }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $icon !!}
        </svg>
    @endif

    @if($loading)
        <span>Cargando...</span>
    @else
        {{ $slot }}
    @endif

    @if($icon && $iconPosition === 'right' && !$loading)
        <!-- Icono a la derecha -->
        <svg class="{{ $iconSize }} {{ $iconClasses }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $icon !!}
        </svg>
    @endif
</{{ $tag }}>
