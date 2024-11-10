@props(['active' => false, 'type' => 'a'])

<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}   block rounded-md px-3 py-2 text-base font-medium "
    aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>

{{-- for dynamic --}}
{{-- @if ($type == 'a')
    <a {{ $attributes }}
        class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}   block rounded-md px-3 py-2 text-base font-medium "
        aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
@else
    <button {{ $attributes }}
        class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}   block rounded-md px-3 py-2 text-base font-medium "
        aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</button>
@endif --}}
