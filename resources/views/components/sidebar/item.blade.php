@props(['active' => false, 'title', 'href'])

<div class="mt-1">
  <a href="{{ $href ?? 'javascript:;' }}" class="flex items-center p-2 text-base leading-6 font-medium rounded-md hover:text-white focus:outline-none focus:text-white transition ease-in-out duration-150 cursor-pointer {{ $active ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 focus:bg-gray-700' }}">
    {{ $icon ?? '' }}
    <span class="flex-1 ml-4">{{ $title }}</span>
  </a>
</div>
