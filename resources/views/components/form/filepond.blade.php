@push('style')
  @once
    <link rel="stylesheet" href="{{ mix('vendor/filepond/filepond.css') }}">
  @endonce
@endpush

@push('afterScript')
  @once
    <script src="{{ mix('vendor/filepond/filepond.js') }}"></script>
  @endonce
@endpush

@php
  $options = [
    'allowMultiple' => $multiple ?? false,
    'maxFiles' => $maxFiles ?? null,
    'acceptedFileTypes' => ($mineType ?? null) ? (array) $mineType : null,
    'labelFileTypeNotAllowed' => '文件类型无效',
    'fileValidateTypeLabelExpectedTypes' => '可用的类型为 {allButLastType} 或者 {lastType}',
    'maxFileSize' => ($size ?? null) ? $size.'KB' : null,
    'labelMaxFileSizeExceeded' => '文件过大',
    'labelMaxFileSize' => '文件大小不超过 {filesize}',
    'allowImagePreview' => $imagePreview ?? false
  ];

  $filepondFiles = [];
  foreach (explode(',', $value ?? '') as $file) {
    if ($file) {
      $filepondFile['source'] = $file;
      $filepondFile['options'] = ['type' => 'local'];
      $filepondFiles[] = $filepondFile;
    }
  }
  if ($filepondFiles) {
    $options['files'] = $filepondFiles;
  }
  $selector = 'filepond-' . $name;
@endphp

<div class="mb-5" x-data="{path: '', filepond: null}" x-init="
  FilePond.setOptions({
    server: {
      url: '/admin/filepond',
      process: {
        url: '/process',
        onload: (response) => {
          path = eval('('+response+')');
          return path;
        }
      },
      revert: '/revert',
      restore: '/load?load=',
      load: '/load?load=',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }
  });
  filepond = FilePond.create($refs[`{{ $selector }}`], JSON.parse(`{{ json_encode($options) }}`));
  " x-cloak>
  @if($label ?? null)
    <label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
      {{ $label }}
    </label>
  @endif

  <div class="relative">
    <input x-ref="{{ $selector }}" type="file" class="{{ $errors->has($name) ? 'filepond-has-error' : '' }}">
    <input type="hidden" name="{{ $name }}" :value="path">

    @error($name)
    <div class="absolute inset-y-0 right-0 pt-2 px-2">
      <svg class="text-red-600 w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
      </svg>
    </div>
    @enderror
  </div>

  @isset($hint)
    <div class="text-sm text-gray-500 my-2 leading-tight help-text">{{ $hint }}</div>
  @endisset

  @error($name)
  <div class="text-red-600 mt-2 text-sm block leading-tight error-text">{{ $message }}</div>
  @enderror
</div>
