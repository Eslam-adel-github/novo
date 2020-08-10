<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('calls.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.calls') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            @if (userCan("Add Calls"))
                <li class="kt-menu__item {{ is_active('calls.create') }}" aria-haspopup="true">
                    <a href="{{ route('calls.create') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.call') }}</span>
                    </a>
                </li>
            @endif

            @if (userCan("Show Calls"))
                <li class="kt-menu__item {{ is_active('calls.index') }}" aria-haspopup="true">
                    <a href="{{ route('calls.index') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.calls') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
