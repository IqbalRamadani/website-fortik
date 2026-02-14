@props(['active' => 'false'])

<a {{ $attributes }} aria-current="{{ $active ? 'page' : false }}" class="{{ $active ? 'bg-blue-700 text-gray-200 md:text-blue-700 md:bg-transparent' : 'text-gray-900 md:hover:bg-transparent hover:text-blue-700' }} block py-2 px-3 rounded-sm md:p-0" aria-current="page">{{ $slot }}</a>