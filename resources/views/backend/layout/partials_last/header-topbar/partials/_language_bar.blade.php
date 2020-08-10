<div class="kt-header__topbar-item kt-header__topbar-item--langs">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
        <span class="kt-header__topbar-icon">
            <img class="" src="{{ asset(GetLanguageValues(GetLanguage(),'flag')) }}" alt=""/>
        </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
        <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
            @foreach(AppLanguages() as $language)
                <li class="kt-nav__item {{ GetLanguage() == $language ? 'kt-nav__item--active' : '' }}">
                    <a href="{{ route('lang.change', [$language]) }}" class="kt-nav__link">
                        <span class="kt-nav__link-icon">
                            <img src="{{ asset(GetLanguageValues($language,'flag')) }}" alt=""/>
                        </span>
                        <span class="kt-nav__link-text"> {{ GetLanguageValues($language,'name') }} </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
