<div class="kt-header__topbar kt-grid__item">

    <!--begin: Search -->
    <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" title="{{trans('main.search_in_sys_fun')}}" id="kt_quick_search_toggle">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
            <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
                <form method="get" class="kt-quick-search__form">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                        <input type="text" id="kt-quick-panel-search" class="form-control kt-quick-search__input"  placeholder="{{trans('main.search_in_sys_fun')}}">
                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                    </div>
                </form>
                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200"> </div>
            </div>
        </div>
    </div>
    <!--end: Search -->


    <!--begin: Notifications -->
    @include('backend.layout.partials.header-topbar.partials._notifications')
    <!--end: Notifications -->

    <!--begin: Quick actions -->
    @include('backend.layout.partials.header-topbar.partials._quick_actions')
    <!--end: Quick actions -->
    <!--begin search in lead -->

    <!-- end search in lead -->

    <!--begin: Language bar -->
    @include('backend.layout.partials.header-topbar.partials._language_bar')
    <!--end: Language bar -->

    <!--begin: User bar -->
    @include('backend.layout.partials.header-topbar.partials._user_bar')
    <!--end: User bar -->

    <!--begin: Quick panel toggler -->
    {{-- <div class="kt-header__topbar-item" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
        <div class="kt-header__topbar-wrapper">
            <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-cube-1"></i></span>
        </div>
    </div> --}}
    <!--end: Quick panel toggler -->
</div>


