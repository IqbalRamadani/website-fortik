@props(['active' => 'false'])

<a {{ $attributes }} aria-current="{{ $active ? 'page' : false }}" class="{{ $active ? 'text-supernova' : 'text-white hover:text-supernova' }} inline-flex items-center w-full p-2 px-3 rounded-sm md:p-0" aria-current="page">{{ $slot }}</a>