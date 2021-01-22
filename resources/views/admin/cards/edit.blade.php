@extends('layouts.admin')
@section('title', '编辑卡片')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '卡片' => route('admin.cards.index'),
      '编辑'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">编辑卡片</h1>
  </div>
  <x-card>
    <x-form action="{{ route('admin.cards.update', $card) }}" method="put">
      <x-form.select label="分组" name="group_id" placeholder="请选择分组">
        @foreach($cardGroups as $cardGroup)
          <option value="{{ $cardGroup->id }}" {{ $cardGroup->id == $card->group_id ? 'selected' : '' }}>{{ $cardGroup->name }}</option>
        @endforeach
      </x-form.select>
      <x-form.input label="名称" name="name" value="{{ $card->name }}" placeholder="请输入名称"></x-form.input>
      <x-form.input label="英文名称" name="name_en" value="{{ $card->name_en }}" placeholder="请输入英文名称"></x-form.input>
      <div class="grid grid-cols-6 gap-x-6">
        <div class="col-span-6 sm:col-span-2">
          <x-form.input label="中文拼写" name="spell_cn" value="{{ $card->spell_cn }}" placeholder="请输入中文拼写"></x-form.input>
        </div>
        <div class="col-span-6 sm:col-span-2">
          <x-form.input label="美式拼写" name="spell_en" value="{{ $card->spell_en }}" placeholder="请输入美式拼写"></x-form.input>
        </div>
        <div class="col-span-6 sm:col-span-2">
          <x-form.input label="英式拼写" name="spell_uk" value="{{ $card->spell_uk }}" placeholder="请输入英式拼写"></x-form.input>
        </div>
      </div>
      <x-form.input label="封面" name="cover" placeholder="请输入封面"></x-form.input>
      <x-form-label label="颜色样式">
        <div class="flex items-center space-x-12">
          @foreach(\App\Models\Card::$colorMap as $color)
            <x-form.radio name="color" value="{{ $color }}" :checked="$card->color == $color">
              <div class="rounded-full w-5 h-5 {{ 'bg-' . $color . '-600' }}"></div>
            </x-form.radio>
          @endforeach
        </div>
      </x-form-label>
      <x-form.input type="number" label="排序" name="index" value="{{ $card->index }}" placeholder="请输入排序"></x-form.input>
      <x-form.switch label="状态" name="status" :value="$card->status"></x-form.switch>
      <div class="flex items-center justify-between">
        <x-button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">保存</x-button>
      </div>
    </x-form>
  </x-card>
@endsection
