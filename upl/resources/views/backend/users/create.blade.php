@extends('backend.layout.app')

@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot

        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.users.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.users') }}
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
            {{ __('main.add') }} {{ __('main.user') }}
        </a>

        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.users.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __('main.users') }}</span>
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
            {{ route('admin.users.index') }}
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
                        <a href="#" @click.prevent="send()" class="kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-reload"></i>
                            <span class="kt-nav__link-text">{{ __("main.save_and_continue") }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endslot

        <form class="kt-form" id="kt_form" action="#" method="get">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    @include('backend.users._partials._fields', [
                        'action' => 'create',
                    ])
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
    @endcomponent
@endsection

@section('js_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/css/bootstrap-tour-standalone.min.css" integrity="sha256-U3XOxpt3EMRgULgaBrCl51hlDx7GpPZlS6/VSuU9szk=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/js/bootstrap-tour-standalone.min.js" integrity="sha256-yw2gxCA8ajzFaQT3M6OAlc+j+u6louuE91FdCc6Vghg=" crossorigin="anonymous"></script><!--end::Global Theme Bundle -->
    @include('backend.users._partials._scripts', [
            'action' => 'create',
            'data' => collect(old()),
            'submitUrl' => route('admin.users.store'),
        ])
@endsection
