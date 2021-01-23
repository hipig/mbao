@extends('layouts.admin')
@section('title', '编辑卡片分组')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '卡片分组' => route('admin.card-groups.index'),
      '编辑'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">编辑卡片分组</h1>
  </div>
  <x-card>
    <x-form action="{{ route('admin.card-groups.update', $card_group) }}" method="put">
      <x-form.input label="名称" name="name" value="{{ $card_group->name }}" placeholder="请输入名称"></x-form.input>
      <x-form.input label="英文名称" name="name_en" value="{{ $card_group->name_en }}" placeholder="请输入英文名称"></x-form.input>
      <x-form.filepond label="封面" name="cover" mine-type="image/*" value="{{ $card_group->cover }}" :image-preview="true"></x-form.filepond>
      <x-form-label label="颜色样式">
        <div class="flex items-center space-x-12">
          @foreach(\App\Models\CardGroup::$colorMap as $color)
            <x-form.radio name="color" value="{{ $color }}" :checked="$card_group->color == $color">
              <div class="rounded-full w-5 h-5 {{ 'bg-' . $color . '-600' }}"></div>
            </x-form.radio>
          @endforeach
        </div>
      </x-form-label>
      <x-form.input type="number" label="排序" name="index" value="{{ $card_group->index }}" placeholder="请输入排序"></x-form.input>
      <x-form.switch label="是否付费" name="is_pro" :value="$card_group->is_pro"></x-form.switch>
      <x-form.switch label="状态" name="status" :value="$card_group->status"></x-form.switch>
      <div class="flex items-center justify-between">
        <x-button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">保存</x-button>
      </div>
    </x-form>
  </x-card>
@endsection
