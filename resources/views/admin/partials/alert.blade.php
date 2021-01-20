@if(session('info'))
  <x-alert type="info">{{ session('info') }}</x-alert>
@endif

@if(session('warning'))
  <x-alert type="warning">{{ session('warning') }}</x-alert>
@endif

@if(session('success'))
  <x-alert type="success">{{ session('success') }}</x-alert>
@endif

@if(session('error'))
  <x-alert type="error">{{ session('error') }}</x-alert>
@endif
