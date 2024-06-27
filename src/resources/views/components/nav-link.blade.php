@props(['active' =>false ,'type' => 'a'])

@if($type == 'a')
<a class="{{ $active ? 'underline underline-offset-8 decoration-2' : 'hover:underline underline-offset-8 decoration-2 transition-all duration-300'}} px-3 py-2 text-sm font-medium text-black" 
 aria-current="{{ $active ? true : false }}" {{ $attributes }}>{{ $slot }}</a>
@else
<button class="{{ $active ? 'underline underline-offset-8 decoration-2' : 'hover:underline underline-offset-8 decoration-2 transition-all duration-300'}} px-3 py-2 text-sm font-medium text-black" 
 aria-current="{{ $active ? true : false }}" {{ $attributes }}>{{ $slot }}</button>
 @endif