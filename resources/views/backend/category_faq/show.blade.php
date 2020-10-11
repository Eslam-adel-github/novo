@extends('backend.layout.app')

@section('sub_header')
    @component('backend.layout.components.sub-header')

        @slot('title')
            {{  $title }}
        @endslot
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.faq_category.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.faq') }} {{ __('main.categories') }}
        </a>
        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.faq_category.edit', [$show->id]) }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-edit"></i>
                    <span class="kt-nav__link-text">{{ __('main.edit') }} {{ __('main.faq') }} {{ __('main.category') }} </span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.faq_category.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __('main.faq') }} {{ __('main.categories') }} </span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.faq_category.create') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-add"></i>
                    <span class="kt-nav__link-text">{{ __('main.add_new') }} {{ __('main.faq') }} {{ __('main.category') }} </span>
                </a>
            </li>
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ $title }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.name') }} (en): </strong>
                            {{ VarByLang(getData(collect($show),"name"),"en") }}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.name') }} (ar): </strong>
                            {{ VarByLang(getData(collect($show),"name"),"ar") }}
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.created_at') }}: </strong>
                            {{ $show->created_at }}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.updated_at') }}: </strong>
                            {{ $show->updated_at }}
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
