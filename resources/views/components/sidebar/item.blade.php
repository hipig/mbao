@props(['data' => [], 'icon'])

@if($data['children'] ?? null)
  <div class="mt-1" x-data="{open: false}">
    <a href="javascript:;" @click="open = !open" class="flex items-center p-2 text-base leading-6 font-medium rounded-md hover:text-white focus:outline-none focus:text-white transition ease-in-out duration-150 cursor-pointer {{ $data['active'] ?? false ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 focus:bg-gray-700' }}">
      @if($data['icon'] ?? null)
        @include('admin.partials.icons.outline.' . $data['icon'])
      @endif
      <span class="flex-1 ml-4">{{ $data['title'] }}</span>
      <svg class="w-4 h-4 transition-all duration-300 ease-in-out" :class="{'transform rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </a>

    <div class="bg-gray-800 py-1"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-show="open">
      @foreach($data['children'] as $item)
        <a href="{{ $item['href'] ?? 'javascript:;' }}" class="flex items-center p-2 text-base leading-6 font-medium rounded-md hover:text-white focus:outline-none focus:text-white transition ease-in-out duration-150 cursor-pointer {{ $item['active'] ?? false ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 focus:bg-gray-700' }}">
          <span class="flex-1 ml-10">{{ $item['title'] }}</span>
        </a>
      @endforeach
    </div>
  </div>
@else
  <div class="mt-1">
    <a href="{{ $data['href'] ?? 'javascript:;' }}" class="flex items-center p-2 text-base leading-6 font-medium rounded-md hover:text-white focus:outline-none focus:text-white transition ease-in-out duration-150 cursor-pointer {{ $data['active'] ?? false ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 focus:bg-gray-700' }}">
      @if($data['icon'] ?? null)
        @include('admin.partials.icons.outline.' . $data['icon'])
      @endif
      <span class="flex-1 ml-4">{{ $data['title'] }}</span>
    </a>
  </div>
@endif
