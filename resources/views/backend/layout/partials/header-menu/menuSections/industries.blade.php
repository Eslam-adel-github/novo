<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('industries.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.industries') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            @if (userCan("Add Industries"))
                <li class="kt-menu__item {{ is_active('industries.create') }}" aria-haspopup="true">
                    <a href="{{ route('industries.create') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.industry') }}</span>
                    </a>
                </li>
            @endif
            @if (userCan("Show Industries"))
                <li class="kt-menu__item {{ is_active('industries.index') }}" aria-haspopup="true">
                    <a href="{{ route('industries.index') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.industries') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
