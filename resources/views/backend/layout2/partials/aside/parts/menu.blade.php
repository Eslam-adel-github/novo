<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item {{ is_active(userType()::prefix().'dashboard') }}" aria-haspopup="true">
                <a href="{{ route(userType()::prefix().'dashboard') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon2-poll-symbol"></i>
                    <span class="kt-menu__link-text">{{ __('main.dashboard') }}</span>
                </a>
            </li>
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Group 1</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                @include('backend.layout.partials.aside.parts.menuSections.users')
                @include('backend.layout.partials.aside.parts.menuSections.rethink_obesity')
                @include('backend.layout.partials.aside.parts.menuSections.youtube_video')

        </ul>
    </div>
</div>
