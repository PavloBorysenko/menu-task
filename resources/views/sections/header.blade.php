<header class="bg-[#201E50] border-b border-[#4D4E7C] task-menu-header">
  <div class="container mx-auto w-3/4 flex flex-col md:flex-row items-center justify-between py-4">
    <div class="flex items-center flex-1 gap-8 w-full md:w-auto md:mr-8 mb-4 md:mb-0">
      {{-- Logo --}}
      <div class="h-10 shrink-0 hidden md:block ">
        @if ($customLogo)
          <img src="{{ $customLogo }}" alt="{{ $siteName }}" class="h-10 w-auto menu-task-logo">
        @else
          <span class="text-white text-xl font-bold">{{ $siteName }}</span>
        @endif
      </div>

      {{-- Search field --}}
      <div class="w-full md:max-w-[800px] min-w-[200px] h-10">
        @if ($isWooEnabled)
          @include('woocommerce.search')
        @else
          @include('forms.search')
        @endif
      </div>

    </div>

    <div class="flex justify-between md:justify-end items-center w-full md:w-auto gap-4 md:gap-6 h-10 shrink-0">
      {{-- login --}}
      @if ($userName)
        <span class="text-white text-sm font-bold">{{ $userName }}</span>
      @else
        <a href="{{ wp_login_url() }}" class="text-white flex items-center h-10">
          <span class="dashicons dashicons-admin-users"></span>
        </a>
      @endif

      {{-- Cart --}}
      @if ($isWooEnabled)
        @include('woocommerce.cart')
      @endif

    </div>
  </div>

  <div class="border-b border-[#4D4E7C]"></div>

  {{-- Menu --}}
  @include('components.menu')

</header>
