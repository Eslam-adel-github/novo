<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('dev_contacts.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:void(0)" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.dev_contacts') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item {{ is_active('dev_contacts.create') }}" aria-haspopup="true">
                <a href="{{ route('dev_contacts.create') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                    <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.dev_contact') }}</span>
                </a>
            </li>
            <li class="kt-menu__item {{ is_active('dev_contacts.index') }}" aria-haspopup="true">
                <a href="{{ route('dev_contacts.index') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                    <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.dev_contacts') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
