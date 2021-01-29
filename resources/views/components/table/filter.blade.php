@props(['name' => 'search', 'placeholder' => '搜索...'])

<x-form action="{{ request()->url() }}" method="get">
  <x-form.input name="{{ $name }}" value="{{ request()->input($name) }}" placeholder="{{ $placeholder }}" class="h-8 py-1 px-2 text-sm {{ $slot == '' ? '' : 'border-r-0' }}">
    @if($slot != '')
      <x-slot name="right">
        <x-dropdown>
          <span class="inline-flex items-center h-8 py-1 px-2 text-sm rounded-r-md border border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
          </span>
          <x-slot name="menu">
            <div class="w-64 rounded-lg shadow-lg py-1 bg-white ring-1 ring-gray-400 ring-opacity-5 divide-y divide-gray-100">
              <div class="px-5 py-2 text-gray-900">筛选</div>
              <div class="px-5 py-2 space-y-5">
                {{ $slot }}
                <x-button type="submit" size="text-sm py-1 px-3" class="w-full text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                  <span class="ml-2">搜索</span>
                </x-button>
              </div>
            </div>
          </x-slot>
        </x-dropdown>
      </x-slot>
    @endif
  </x-form.input>
</x-form>
