<nav class="bg-[#201E50] h-10">
  <div class="flex flex-col md:flex-row items-center justify-between relative">
    <div class="relative w-full">
      <div class="w-3/4 mx-auto ">
        <button id="task-menu-button"  class="text-white px-0 py-2 flex items-center font-normal">
          <span class="dashicons dashicons-editor-ul mr-2"></span>
          {{ esc_html__('Products', 'menu-task') }}
        </button>
      </div>
      <div id="task-menu-dropdown"  class="absolute inset-x-0 top-full w-screen bg-white shadow-md hidden">
        <div class="mega-menu-content w-3/4 mx-auto py-4 flex justify-between items-start">
          @if (!empty($menuItems))
            <ul class="menu-task-list min-w-[16rem] w-auto font-normal">
              @foreach ($menuItems as $item)
                <x-sub-menu :item="$item" />
              @endforeach
            </ul>
          @else
            <p class="text-sm text-gray-500 px-4">{{ esc_html__('Please set up the menu in the admin panel', 'menu-task') }}</p>
          @endif
          <div class="hidden md:flex w-full max-w-[386px] h-auto aspect-[4/3] bg-gray-100 items-center justify-cente">
            @if ($megaMenuImage)
              <img
                  src="{{ $megaMenuImage }}"
                  alt="Mega Menu Image"
                  class="max-w-full max-h-full object-cover object-center"
              />
            @else
              <p class="text-sm text-gray-500 px-4">{{ esc_html__('Please add image in theme settings', 'menu-task') }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
