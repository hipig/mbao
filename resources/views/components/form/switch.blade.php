<div class="mb-5">
  @if($label ?? null)
    <label class="form-label block mb-1 font-semibold text-gray-700">
      {{ $label }}
    </label>
  @endif
  <span
    {{ $attributes }}
    x-data="{ isOn: false }"
    x-init="isOn = !! '{{ old($name, $value ?? null) }}'"
    x-on:click="isOn = !isOn"
    :aria-checked="isOn"
    :class="{'border-indigo-600 bg-indigo-600': isOn, 'border--gray-200 bg-gray-200': !isOn }"
    class="relative inline-block flex-shrink-0 h-6 border-2 rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
    style="width: 2.75rem"
    role="checkbox"
    tabindex="0"
  >
		<input type="hidden" name="{{ $name }}" :value="isOn">
		<span
      aria-hidden="true"
      :class="{'translate-x-full': isOn, 'translate-x-0': !isOn }"
      class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"
    ></span>
	</span>
</div>
