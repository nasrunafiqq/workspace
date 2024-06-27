@php
    $classes = 'bg-green-500 transition-colors text-white duration-300 hover:bg-green-600 rounded py-2 px-4 ';
@endphp

<button {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</button>