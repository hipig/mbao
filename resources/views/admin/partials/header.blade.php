<nav class="relative flex-shrink-0 flex h-16 bg-white shadow z-20">
  <div class="flex-1 px-4 flex justify-between">
    <div class="flex-1 flex">
      <div class="w-full flex md:ml-0"></div>
    </div>
    <div class="ml-4 flex items-center md:ml-6 space-x-2">
      @auth
        <x-dropdown>
          <button type="button" class="inline-flex items-center rounded-full bg-white focus:outline-none">
            <img src="https://www.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028" alt="Profile Photo" class="h-8 w-8 object-cover rounded-full">
            <span class="ml-2 hidden md:block">{{ Auth::user()->nickname }}</span>
          </button>
          <x-slot name="menu">
            <div class="w-48 rounded-lg shadow-lg py-1 bg-white ring-1 ring-gray-400 ring-opacity-5 divide-y divide-gray-100">
              <div class="py-1">
                <a href="#" class="flex items-center px-4 py-2 leading-tight hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                  <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  <span class="ml-2">账户设置</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 leading-tight hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                  <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                  </svg>
                  <span class="ml-2">修改密码</span>
                </a>
              </div>
              <div class="py-1">
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="flex items-center w-full px-4 py-2 leading-tight hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="ml-2">退出登录</span>
                  </button>
                </form>
              </div>
            </div>
          </x-slot>
        </x-dropdown>
      @endauth
    </div>
  </div>
</nav>
