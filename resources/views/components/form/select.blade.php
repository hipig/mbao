<div class="flex flex-col">
  <x-form-label label="{{ $label ?? null }}" for="{{ $name }}" class="{{ $labelClass ?? '' }}"></x-form-label>

  <div class="relative">
    <select
      id="{{ $name }}"
      name="{{ $name }}"
      {{ $attributes->merge([
        'class' => 'block w-full border shadow-sm rounded-md leading-snug ' . ($errors->has($name) ? ' focus:ring-red-500 focus:border-red-500 border-red-500 bg-red-100 pr-10' : ' focus:ring-indigo-500 focus:border-indigo-500 border-gray-300')
      ])}}
    >
      @if($placeholder ?? null)
        <option value="" disabled>{{ $placeholder }}</option>
      @endif
      {{ $slot }}
    </select>

    @error($name)
    <div class="flex items-center absolute inset-y-0 right-0 px-2">
      <svg class="text-red-600 w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
      </svg>
    </div>

    @enderror
  </div>

  @isset($hint)
    <div class="text-sm text-gray-500 mt-2 leading-tight help-text">{!! $hint !!}</div>
  @endisset

  @error($name)
    <div class="text-red-600 mt-2 text-sm block leading-tight error-text">{{ $message }}</div>
  @enderror
</div>
