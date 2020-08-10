<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('unit_views.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.unit_views') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            @if (userCan("Add Unit_views"))
                <li class="kt-menu__item {{ is_active('unit_views.create') }}" aria-haspopup="true">
                    <a href="{{ route('unit_views.create') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.unit_view') }}</span>
                    </a>
                </li>
            @endif
            @if (userCan("Show Unit_views"))
                <li class="kt-menu__item {{ is_active('unit_views.index') }}" aria-haspopup="true">
                    <a href="{{ route('unit_views.index') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.unit_views') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
