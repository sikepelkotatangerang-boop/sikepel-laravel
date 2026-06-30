@props(['active' => false, 'href' => '#'])

@php
$baseClasses = 'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-150';

$activeClasses = 'bg-indigo-50 text-indigo-700 shadow-sm';
$inactiveClasses = 'text-slate-600 hover:bg-slate-100 hover:text-slate-900';

$classes = $active ? "{$baseClasses} {$activeClasses}" : "{$baseClasses} {$inactiveClasses}";
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>