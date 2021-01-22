<label
  class="inline-flex items-center text-truncate">
  <input
    id="{{ $name }}"
    type="radio"
    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
    name="{{ $name }}"
    value="{{ old($name, $value ?? '') }}"
    {{ $attributes }}>
  @if($slot ?? null)
    <span class="ml-2 select-none text-gray-700">
      {{ $slot }}
    </span>
  @endif
</label>
