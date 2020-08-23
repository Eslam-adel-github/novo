<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
        <span class="kt-header__topbar-username kt-visible-desktop">{{ auth()->user()->name }}</span>
        <img alt="Pic" src="{!! ShowImageFromStorage(null, 'WebsiteSetting-collection', 'avatar') !!}" />

        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
            <div class="kt-user-card__avatar">
                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <span class="kt-badge kt-badge--username kt-badge--unified-info kt-badge--md kt-badge--rounded kt-badge--light">{{ getFirstCharacters(auth()->user()->name) }}</span>
            </div>
            <div class="kt-user-card__name">
                {{ auth()->user()->name }}
            </div>
            <div class="kt-user-card__badge">
                <span class="btn btn-label-info btn-sm btn-bold btn-font-md">3</span>
            </div>
        </div>

        <!--end: Head -->

        <!--begin: Navigation -->
        <div class="kt-notification">
            <a href="{{ route('admin.users.edit', [auth()->id()]) }}?profile=yes" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        {{ __('main.profile') }}
                    </div>
                </div>
            </a>
            <a href="{{ aurl('/calendar') }}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        {{ __('main.calendar') }}
                    </div>
                </div>
            </a>

            <div class="kt-notification__custom kt-space-between">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <!--end: Navigation -->
    </div>
</div>
