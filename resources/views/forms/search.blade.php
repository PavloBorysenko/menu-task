<form role="search" method="get" class="search-form w-full h-full" action="{{ home_url('/') }}">
  <label class="w-full h-full">
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>

    <input
      type="search"
      placeholder="{!! esc_attr_x('Search for a post', 'placeholder', 'sage') !!}"
      value="{{ get_search_query() }}"
      name="s"
      class="w-full h-full px-4 py-2 rounded-sm text-gray-500 border border-transparent focus:border-gray-300 focus:ring-2 focus:ring-indigo-500 placeholder-gray-500"
    >
  </label>
</form>
