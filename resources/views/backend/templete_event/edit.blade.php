@extends('backend.layout.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@voerro/vue-tagsinput@2.2.0/dist/style.css">
@endsection

@section('sub_header')
{{-- vue multi select documentation https://vue-multiselect.js.org/#sub-select-with-search  --}}

<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

    @component('backend.layout.components.sub-header')
        @slot('title')
            {{$title }}
        @endslot
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.templete_event.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.templete_events') }}
        </a>
        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.templete_event.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{__('main.templete_events')}}</span>
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
                    @include('backend.templete_event._partials._fields', [
                        'data' => collect($edit),
                        'action' => 'edit',
                    ])
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
    @endcomponent
@endsection

@section('js_scripts')
    @include('backend.templete_event._partials._scripts', [
        'action' => 'edit',
        'data' => collect($edit),
        'submitUrl' => route('admin.templete_event.update', [$edit->id]),
    ])
@endsection
