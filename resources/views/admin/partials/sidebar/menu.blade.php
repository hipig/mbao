@php

  $menus = [
    '系统' => [
      [
        'title' => '仪表盘',
        'href' => route('admin.dashboard'),
        'icon' => 'home',
        'active' => true
      ],
      [
        'title' => '系统设置',
        'icon' => 'cog',
        'children' => [
            [
              'title' => '基础',
            ],
            [
              'title' => '支付方式',
            ],
          ],
      ],
      [
        'title' => '方案',
        'icon' => 'bookmark-alt',
      ],
      [
        'title' => '订阅记录',
        'icon' => 'document-text',
      ],
      [
        'title' => '用户',
        'icon' => 'users',
      ],
      [
        'title' => '页面',
        'icon' => 'duplicate',
      ],
    ],
    '资源' => [
      [
        'title' => '分组',
        'icon' => 'folder-open',
      ],
      [
        'title' => '卡片',
        'icon' => 'duplicate',
      ],
      [
        'title' => '学习报告',
        'icon' => 'document-report',
      ],
    ],
  ];

@endphp

<nav class="flex-1 px-2 py-4 bg-gray-800">
  @foreach($menus as $label => $menu)
    <x-sidebar.group :title="$label">
      @foreach($menu as $data)
        <x-sidebar.item :data="$data"></x-sidebar.item>
      @endforeach
    </x-sidebar.group>
  @endforeach
</nav>
