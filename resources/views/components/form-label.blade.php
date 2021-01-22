<div class="mb-5">
  @if($label ?? null)
    <label class="form-label block mb-1 font-semibold text-gray-700">
      {{ $label }}
    </label>
  @endif
  {{ $slot }}
</div>
