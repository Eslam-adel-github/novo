<li class="kt-menu__item  kt-menu__item--submenu {{ is_active('cil_templates.*', true) }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
    <a href="javascript:void(0)" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-icon flaticon2-user"></i>
        <span class="kt-menu__link-text">{{ __('main.cil_templates') }}</span>
        <i class="kt-menu__hor-arrow la la-angle-right"></i>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item {{ is_active('cil_templates.create') }}" aria-haspopup="true">
                <a href="{{ route('cil_templates.create') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                    <span class="kt-menu__link-text">{{ __('main.add') }} {{ __('main.cil_template') }}</span>
                </a>
            </li>
            <li class="kt-menu__item {{ is_active('cil_templates.index') }}" aria-haspopup="true">
                <a href="{{ route('cil_templates.index') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                    <span class="kt-menu__link-text">{{ __('main.show-all') }} {{ __('main.cil_templates') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
