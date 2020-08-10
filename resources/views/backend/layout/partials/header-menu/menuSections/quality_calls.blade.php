<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('quality_calls.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:void(0)" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.quality_calls') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item {{ is_active('quality_calls.create') }}" aria-haspopup="true">
                <a href="{{ route('quality_calls.create') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                    <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.quality_call') }}</span>
                </a>
            </li>
            <li class="kt-menu__item {{ is_active('quality_calls.index') }}" aria-haspopup="true">
                <a href="{{ route('quality_calls.index') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                    <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.quality_calls') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
