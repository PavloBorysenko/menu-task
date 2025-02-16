<a href="{{ wc_get_cart_url() }}" class="text-white flex items-center h-10 relative">
  <span class="bg-[#BA2C73] text-white text-sm px-3 flex items-center justify-center h-10 min-w-[40px] rounded">
    <span class="dashicons dashicons-cart"></span>
    <span class="ml-1">{!! WC()->cart->get_cart_total() !!}</span>
  </span>
</a>
