@props(['item'])

@php
  $hasChildren = !empty($item['children']);
  $dataAttr = 'item-' . ($item['ID'] ?? uniqid());
@endphp

<li class="relative" data-item="{{ $dataAttr }}">
  <a href="{{ $item['url'] }}"
  class="block px-4 py-2 flex justify-between items-center hover:bg-[#BA2C73] group text-black hover:text-white">
    <span>{{ $item['title'] }}</span>
    @if($hasChildren)
      <span class="dashicons dashicons-controls-play ml-2"></span>
    @endif
  </a>

  @if($hasChildren)
    <ul class="menu-task-list min-w-[16rem] w-auto absolute left-full top-0 bg-white shadow-md hidden">
      @foreach($item['children'] as $child)
        <x-sub-menu :item="$child" />
      @endforeach
    </ul>
  @endif
</li>

