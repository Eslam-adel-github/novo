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
            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel {{ is_active('admin/dashboard') }}"
                data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                <a href="{{ route('admin.dashboard') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">{{ __('main.dashboard') }}</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>

            <li  class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click"
                aria-haspopup="true">
                <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">
                            <i class="flaticon-more-1"></i>
                        </span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.specialty.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.specialties') }} </span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.video_group.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.video_group') }} </span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.faq_category.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.faq') }} {{ trans('main.categories') }} </span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                             <a href="{{ route('admin.category_library.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ trans('main.categories') }} {{ trans('main.library') }} </span>
                             </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.faq.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.faqs') }}</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.library.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.library') }}</span>
                            </a>
                        </li>
                        {{--
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.HCP.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.HCP') }}</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.pharmacy.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.pharmacies') }}</span>
                            </a>
                        </li>
                        --}}
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.event_type.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.event_type') }}</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.templete_event.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.templete_event') }}</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.event.index') }}" class="kt-menu__link">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">{{ trans('main.events') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

</div>
