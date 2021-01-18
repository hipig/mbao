@if($links)
  <div class="flex items-center my-4">
    @foreach($links as $key => $value)
      @if($loop->last && is_numeric($key))
        <span class="text-gray-900 truncate">{{ $value }}</span>
      @else
        <a href="{{ $value }}" class="text-gray-500">{{ $key }}</a>
        <svg class="text-gray-500 w-5 h-5 mx-3" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
        </svg>
      @endif
    @endforeach
  </div>
@endif
