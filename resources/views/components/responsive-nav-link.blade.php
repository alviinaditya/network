@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-cyan-400 text-base font-medium text-cyan-700 bg-cyan-50 focus:outline-none focus:text-cyan-800 focus:bg-cyan-100 focus:border-cyan-700 transition duration-150 ease-in-out dark:text-cyan-700 dark:focus:bg-gray-900 dark:bg-gray-900'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out dark:text-gray-400 dark:hover:text-gray-200 dark:hover:bg-gray-900 dark:focus:bg-gray-900 dark:hover:border-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
