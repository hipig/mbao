@php

  $menus = [
    '系统' => [
      [
        'title' => '仪表盘',
        'href' => route('admin.dashboard'),
        'icon' => 'home',
        'active' => if_route_pattern('admin.dashboard'),
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
        'active' => if_route_pattern('admin.settings.*'),
      ],
      [
        'title' => '方案',
        'href' => route('admin.plans.index'),
        'icon' => 'server',
        'active' => if_route_pattern('admin.plans.*'),
      ],
      [
        'title' => '订阅记录',
        'href' => route('admin.subscriptions.index'),
        'icon' => 'bookmark-alt',
        'active' => if_route_pattern('admin.subscriptions.*'),
      ],
      [
        'title' => '用户',
        'href' => route('admin.users.index'),
        'icon' => 'users',
        'active' => if_route_pattern('admin.users.*'),
      ],
      [
        'title' => '页面',
        'href' => route('admin.pages.index'),
        'icon' => 'document-text',
        'active' => if_route_pattern('admin.pages.*'),
      ],
    ],
    '资源' => [
      [
        'title' => '分组',
        'icon' => 'folder-open',
        'active' => if_route_pattern('admin.cardGroups.*'),
      ],
      [
        'title' => '卡片',
        'icon' => 'document-duplicate',
        'active' => if_route_pattern('admin.cards.*'),
      ],
      [
        'title' => '学习报告',
        'icon' => 'document-report',
        'active' => if_route_pattern('admin.learnReports.*'),
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
