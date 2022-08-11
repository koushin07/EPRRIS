@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6'
            : 'flex w-full justify-between text-gray-400 cursor-pointer items-center mb-6';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
