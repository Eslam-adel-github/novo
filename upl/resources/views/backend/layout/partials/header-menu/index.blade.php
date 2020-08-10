<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn">
    <i class="la la-close"></i>
</button>

<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
    <button class="kt-aside-toggler kt-aside-toggler--left" id="kt_aside_toggler">
        <span></span>
    </button>
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
        <ul class="kt-menu__nav">
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click"
                aria-haspopup="true">
            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel {{ is_active('admin') }}"
                data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ aurl('/') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">{{ __('main.dashboard') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active('admin/users',true) }}"
                data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ route('admin.users.index') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">{{ __('main.users') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active('admin/youtube_video') }}"
                data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ route('admin.youtube_video.index') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">{{ __('main.youtube_video_hyper_link') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ is_active('admin/rethink_obesity') }}"
                data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ route('admin.rethink_obesity.index') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">{{ __('main.rethink_obesity') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>

        </ul>
    </div>

</div>
