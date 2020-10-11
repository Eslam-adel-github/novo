@extends('backend.layout.app')

@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot

        <a href="javascript:void(0)" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.website_settings.edit') }}" class="kt-subheader__breadcrumbs-link">
            {{ __("main.website_settings") }}
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="javascript:void(0)" class="kt-subheader__breadcrumbs-link">
            {{ __('main.edit') }} {{ __("main.website_settings") }}:
        </a>

        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.website_settings.edit') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __("main.website_settings") }}</span>
                </a>
            </li>
        @endslot
    @endcomponent
@endsection

@section('content')
    @component('backend.layout.components.form-portlet')

        @slot('title')
            {{ $title }}
        @endslot

        @slot('prevUrl')
            {{ url()->previous() }}
        @endslot

        @slot('vueEvents')
            @click="send()"
        @endslot

        @slot('actions')
            <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <ul class="kt-nav">
                    <li class="kt-nav__item">
                        <a href="javascript:void(0)" @click.prevent="send()" class="kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-reload"></i>
                            <span class="kt-nav__link-text">{{ __("main.save_and_continue") }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endslot

        <form class="kt-form" id="kt_form" action="#" method="get">
            <div class="row">
                <div class="col-xl-12">
                    @include("backend.website_settings._partials._fields", [
                        'action' => 'edit',
                    ])
                </div>
            </div>
        </form>
    @endcomponent
@endsection

@section('js_vendors')
    <script src="{{ asset('backend/dist/assets/js/pages/crud/file-upload/ktavatar.js') }}"></script>
@endsection

@section('js_scripts')

    @include("backend.website_settings._partials._scripts", [
        'action' => 'edit',
        'data' => $edit,
        'submitUrl' => route('admin.website_settings.store'),
    ])
@endsection
