<div class="kt-header__topbar">

    <!--end: Search -->

    <!--begin: Notifications -->
    <div class="kt-header__topbar-item dropdown">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
            <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                    </g>
                </svg> <span class="kt-pulse__ring"></span>
            </span>

            <!-- Use dot badge instead of animated pulse effect: <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--brand"></span> -->
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
            <form>

                <!--begin: Head -->
                <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url('{{ asset('backend/dist/assets/media/misc/bg-1.jpg') }}')">
                    <h3 class="kt-head__title">
                        User Notifications
                        &nbsp;
                    </h3>
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">orders</a>
                        </li>
                    </ul>
                </div>

                <!--end: Head -->
                <div class="tab-content">
                    <div class="tab-pane active  show" id="topbar_notifications_notifications2" role="tabpanel">
                        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                            @if(isset($order_in_topbar))
                            @foreach($order_in_topbar as$key=>$value)
                                @if(Auth::user()->type==userType()::admin)
                                    <a href="{{route(userType()::prefix().'orders.show',["order"=>$value->id])}}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-line-chart kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New Order From {{$value->user->name}}
                                            </div>
                                            <div class="kt-notification__item-time">
                                                {{$value->created_at}}
                                            </div>
                                        </div>
                                    </a>
                                @elseif(Auth::user()->type==userType()::vendor)
                                    <a href="{{route(userType()::prefix().'orders.show',["order"=>$value->id])}}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-line-chart kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title">
                                                New Order From {{$value->order->user->name}}
                                            </div>
                                            <div class="kt-notification__item-time">
                                                {{$value->created_at}}
                                            </div>
                                        </div>
                                    </a>
                                @endif
                           @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!--
                <div class="tab-content">
                    <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-line-chart kt-font-success"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New order has been received
                                    </div>
                                    <div class="kt-notification__item-time">
                                        2 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-box-1 kt-font-brand"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New customer is registered
                                    </div>
                                    <div class="kt-notification__item-time">
                                        3 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-chart2 kt-font-danger"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        Application has been approved
                                    </div>
                                    <div class="kt-notification__item-time">
                                        3 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-image-file kt-font-warning"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New file has been uploaded
                                    </div>
                                    <div class="kt-notification__item-time">
                                        5 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-drop kt-font-info"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New user feedback received
                                    </div>
                                    <div class="kt-notification__item-time">
                                        8 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        System reboot has been successfully completed
                                    </div>
                                    <div class="kt-notification__item-time">
                                        12 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-favourite kt-font-danger"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New order has been placed
                                    </div>
                                    <div class="kt-notification__item-time">
                                        15 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item kt-notification__item--read">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-safe kt-font-primary"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        Company meeting canceled
                                    </div>
                                    <div class="kt-notification__item-time">
                                        19 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-psd kt-font-success"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New report has been received
                                    </div>
                                    <div class="kt-notification__item-time">
                                        23 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon-download-1 kt-font-danger"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        Finance report has been generated
                                    </div>
                                    <div class="kt-notification__item-time">
                                        25 hrs ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon-security kt-font-warning"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New customer comment recieved
                                    </div>
                                    <div class="kt-notification__item-time">
                                        2 days ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="flaticon2-pie-chart kt-font-success"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        New customer is registered
                                    </div>
                                    <div class="kt-notification__item-time">
                                        3 days ago
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                        <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                            <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                    All caught up!
                                    <br>No new notifications.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </form>
        </div>
    </div>

    <!--end: Notifications -->

    <!--begin: Quick Actions -->
    <div class="kt-header__topbar-item dropdown">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
            <span class="kt-header__topbar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                    </g>
                </svg> </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
            <form>

                <!--begin: Head -->
                <div class="kt-head kt-head--skin-dark" style="background-image: url('{{ asset('backend/dist/assets/media/misc/bg-1.jpg') }}')">
                    <h3 class="kt-head__title">
                        Admin Quick Actions
                        <span class="kt-space-15"></span>
                    </h3>
                </div>

                <!--end: Head -->

                <!--begin: Grid Nav -->
                <div class="kt-grid-nav kt-grid-nav--skin-light">

                </div>

                <!--end: Grid Nav -->
            </form>
        </div>
    </div>

    <!--end: Quick Actions -->


    <!--begin: Quick panel toggler
    <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip" title="Quick panel" data-placement="right">
        <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                </g>
            </svg> </span>
    </div>
     -->
    <!--end: Quick panel toggler -->

    <!--begin: Language bar -->

    <div style="display: none" class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <img class="" src="{{ asset('backend/dist/assets/media/flags/020-flag.svg') }}" alt="" />
            </span>
        </div>

        <div style="display: none" class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
            <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                <li class="kt-nav__item kt-nav__item--active">
                    <a href="#" class="kt-nav__link">
                        <span class="kt-nav__link-icon"><img src="{{ asset('backend/dist/assets/media/flags/020-flag.svg') }}" alt="" /></span>
                        <span class="kt-nav__link-text">English</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <span class="kt-nav__link-icon"><img src="{{ asset('backend/dist/assets/media/flags/016-spain.svg') }}" alt="" /></span>
                        <span class="kt-nav__link-text">Spanish</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <span class="kt-nav__link-icon"><img src="{{ asset('backend/dist/assets/media/flags/017-germany.svg') }}" alt="" /></span>
                        <span class="kt-nav__link-text">German</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <!--end: Language bar -->

    <!--begin: User Bar -->
    <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
            <div class="kt-header__topbar-user">
                <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                <span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->name}}</span>
                @if(Auth::user()->image !="")
                    <img width="35" alt="Pic" src="{{ ShowImage(Auth::user()->image) }}"/>
                @else
                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                @endif
            </div>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

            <!--begin: Head -->
            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url('{{ asset('backend/dist/assets/media/misc/bg-1.jpg') }}')">
                <div class="kt-user-card__avatar">
                    @if(Auth::user()->image !="")
                        <!--
                        <img alt="Pic" src="{{ ShowImage(Auth::user()->image) }}" />
                        -->
                    @else
                        <!--
                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                        -->
                    @endif
                </div>
                <div class="kt-user-card__name">
                    {{Auth::user()->name}}
                </div>
            </div>

            <!--end: Head -->

            <!--begin: Navigation -->
            <div class="kt-notification">
                <a href="{{route('admin.dashboard')}}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            My Profile
                        </div>
                        <div class="kt-notification__item-time">
                            Account settings and more
                        </div>
                    </div>
                </a>
                <!--
                <a href="{{route('admin.dashboard')}}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-mail kt-font-warning"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            My Messages
                        </div>
                        <div class="kt-notification__item-time">
                            Inbox and tasks
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.dashboard')}}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-rocket-1 kt-font-danger"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            My Activities
                        </div>
                        <div class="kt-notification__item-time">
                            Logs and notifications
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.dashboard')}}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-hourglass kt-font-brand"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            My Tasks
                        </div>
                        <div class="kt-notification__item-time">
                            latest tasks and projects
                        </div>
                    </div>
                </a>
                <a href="{{route('admin.dashboard')}}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-cardiogram kt-font-warning"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            Billing
                        </div>
                        <div class="kt-notification__item-time">
                            billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
                        </div>
                    </div>
                </a>
                -->
                <div class="kt-notification__custom kt-space-between">
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</button>
                    </form>
                </div>
            </div>

            <!--end: Navigation -->
        </div>
    </div>

    <!--end: User Bar -->
</div>
