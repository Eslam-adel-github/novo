<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('countries.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.countries') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            @if (userCan("Add Countries"))
                <li class="kt-menu__item {{ is_active('countries.create') }}" aria-haspopup="true">
                    <a href="{{ route('countries.create') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.country') }}</span>
                    </a>
                </li>
            @endif
            @if (userCan("Show Countries"))
                <li class="kt-menu__item {{ is_active('countries.index') }}" aria-haspopup="true">
                    <a href="{{ route('countries.index') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.countries') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
