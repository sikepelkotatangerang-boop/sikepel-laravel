@props(['active' => false, 'href' => '#'])

@php
$classes = ($active ?? false)
    ? 'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-700/70 shadow-sm shadow-emerald-900/20 transition-all'
    : 'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-emerald-200/80 hover:text-white hover:bg-emerald-700/40 transition-all';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
