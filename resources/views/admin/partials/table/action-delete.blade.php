<x-modal size="sm:max-w-md">
  <button type="button" class="focus:outline-none text-red-600 hover:text-red-700">删除</button>
  <x-slot name="content">
    <div class="sm:flex sm:items-start">
      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
      </div>
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
          删除文章
        </h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
            是否确认删除？文章的封面会一并删除。
          </p>
        </div>
      </div>
    </div>
  </x-slot>
  <x-slot name="action">
    <x-form action="{{ route('posts.destroy', $post) }}" method="delete">
      <x-button type="submit" name="confirmDelete" class="w-full sm:w-auto sm:text-sm border border-transparent text-white bg-red-600 hover:bg-red-700 focus:ring-red-500 sm:ml-3">确认</x-button>
    </x-form>
  </x-slot>
</x-modal>
@props(['showFooter' => true, 'showCancel' => true, 'showClose' => false, 'size' => 'sm:max-w-lg'])

<div x-ref="delete-confirm" class="inline-flex" x-data="{ open: false }" x-cloak>
  <div x-init="
    () => document.body.classList.add('overflow-hidden');
    $watch('open', value => {
      if (value === true) { document.body.classList.add('overflow-hidden') }
      else { document.body.classList.remove('overflow-hidden') }
    });"
       x-show="open"
       @open-modal.window="open = true"
       class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div x-show="open"
           x-transition:enter="ease-out duration-300"
           x-transition:enter-start="opacity-0"
           x-transition:enter-end="opacity-100"
           x-transition:leave="ease-in duration-200"
           x-transition:leave-start="opacity-100"
           x-transition:leave-end="opacity-0"
           class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
      <div x-show="open"
           x-transition:enter="ease-out duration-300"
           x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
           x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
           x-transition:leave="ease-in duration-200"
           x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
           x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
           class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle {{ $size }} w-full relative"
           role="dialog"
           aria-modal="true"
           aria-labelledby="modal-headline">
        @if($showClose)
          <div class="absolute top-0 right-0 mt-4 mr-4 cursor-pointer" x-on:click="open = false">
            <svg class="w-6 h-6 text-gray-600 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </div>
        @endif
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              @if()
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $title }}
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  是否确认删除？文章的封面会一并删除。
                </p>
              </div>
            </div>
          </div>
        </div>
        @if($showFooter)
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            {{ $action ?? '' }}
            @if($showCancel)
              <x-button x-on:click="open = false" name="cancel" class="mt-3 sm:mt-0 w-full sm:w-auto sm:text-sm border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-indigo-500">取消</x-button>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
