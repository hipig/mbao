@push('style')
  @once
    <link rel="stylesheet" href="{{ mix('vendor/quill/quill.css') }}">
  @endonce
@endpush

@push('beforeScript')
  @once
    <script src="{{ mix('vendor/quill/quill.js') }}"></script>
  @endonce
@endpush

<div class="mb-5" x-data="{ content: '' }" x-init="
		quill = new Quill($refs.quillEditor, {
			modules: {
        toolbar: {
          container: [
            [{'header': 2}, {'header': 3}],
            ['bold', 'italic', 'underline', 'strike'],
            ['link', 'blockquote', 'code-block', 'image'],
            [{ list: 'ordered' }, { list: 'bullet' }, { 'align': [false, 'center', 'right', 'justify']}]
          ]
        }
      },
      theme: '{{ $theme ?? "snow" }}',
      scrollingContainer: 'html, body',
      placeholder: '{{ $placeholder ?? "请输入内容" }}'
    });
    quill.on('text-change', function () {
      content = quill.getText() ? quill.root.innerHTML : ''
    });
    content = quill.root.innerHTML;
">
  @if($label ?? null)
    <label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
      {{ $label }}
    </label>
  @endif

  <div class="relative">
    <input type="hidden" name="{{ $name }}" :value="content">
    <div x-ref="quillEditor" x-model="content" class="bg-white {{ $errors->has($name) ? 'ql-editor-error' : '' }}">
      {!! old($name, $value ?? '') !!}
    </div>

    @error($name)
      <div class="absolute inset-y-0 right-0 pt-2 px-2">
        <svg class="text-red-600 w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
        </svg>
      </div>
    @enderror
  </div>

  @error($name)
    <div class="text-red-600 mt-2 text-sm block leading-tight error-text">{{ $message }}</div>
  @enderror
</div>
