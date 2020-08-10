<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('contract_statuses.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.contract_statuses') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            @if (userCan("Add Contract_statuses"))
                <li class="kt-menu__item {{ is_active('contract_statuses.create') }}" aria-haspopup="true">
                    <a href="{{ route('contract_statuses.create') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.contract_status') }}</span>
                    </a>
                </li>
            @endif
            @if (userCan("Show Contract_statuses"))
                <li class="kt-menu__item {{ is_active('contract_statuses.index') }}" aria-haspopup="true">
                    <a href="{{ route('contract_statuses.index') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                        <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.contract_statuses') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
