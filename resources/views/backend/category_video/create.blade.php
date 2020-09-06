@extends('backend.layout.app')


@section('sub_header')

    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot

        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.video_group.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.videos_groups') }}
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
            {{ __('main.add') }}  {{ __('main.video_group') }}
        </a>

        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.video_group.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }}  {{ __('main.video_group') }}</span>
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
            {{ route('admin.dashboard') }}
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
                        <a href="#" @click.prevent="send('continue')" class="kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-reload"></i>
                            <span class="kt-nav__link-text">{{ __("main.save_and_continue") }}</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" @click.prevent="send('show')" class="kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-reload"></i>
                            <span class="kt-nav__link-text">{{ __("main.save_and_show") }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endslot

        <form class="kt-form" id="kt_form" action="#" method="get">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    @include('backend.category_video._partials._fields', [
                        'data' => collect(old()),
                        'action' => 'create',
                    ])
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
    @endcomponent
@endsection

@section('js_scripts')
    @include('backend.category_video._partials._scripts', [
        'action' => 'create',
        'data' => collect(old()),
        'submitUrl' => route('admin.video_group.store'),
    ])
@endsection
