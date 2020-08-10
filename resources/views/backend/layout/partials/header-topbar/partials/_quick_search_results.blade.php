<div class="kt-quick-search__result">
    @if (count($results))
        <div class="kt-quick-search__category">
            {{ __('main.urls') }}
        </div>
        <div class="kt-quick-search__section">
            @foreach ($results as $route)
                <div class="kt-quick-search__item">
                    <div class="kt-quick-search__item-wrapper">
                        <a href="{{ route($route) }}" class="kt-quick-search__item-title">
                            @php
                                foreach (array_reverse(explode('.', $route)) as $r) {
                                    echo __("main.$r") . ' ';
                                }
                            @endphp
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="kt-quick-search__message">
            No record found
        </div>
    @endif
</div>
