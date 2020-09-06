@extends('backend.layout.app')


@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot

        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.faq.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.faqs') }}
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
            {{ __('main.show') }} {{ __('main.faq') }} #: {{$show->id}}
        </a>

        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.faq.edit', [$show->id]) }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-edit"></i>
                    <span class="kt-nav__link-text">{{ __('main.edit') }} {{ __('main.faq') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.faq.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __('main.faqs') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.faq.create') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-add"></i>
                    <span class="kt-nav__link-text">{{ __('main.add_new') }} {{ __('main.faq') }}</span>
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
                        <div class="col-md-12">
                            <strong>{{ __('main.question') }} (en): </strong>
                            {{ VarByLang(getData(collect($show),"question")) }}
                            <br><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>{{ __('main.question') }} (ar): </strong>
                            {{ VarByLang(getData(collect($show),"question"),"ar") }}
                            <br><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>{{ __('main.description') }}: </strong>
                            {{ VarByLang(getData(collect($show),"description")) }}
                            <br><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>{{ __('main.description') }} (ar): </strong>
                            {{ VarByLang(getData(collect($show),"description"),"ar") }}
                            <br><hr>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <strong>{{ __('main.category') }}: </strong>
                            {{ $show->category ?  VarByLang(getData(collect($show->category),"name")) : ''}}
                            <br><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.created_at') }}: </strong>
                            {{$show->created_at}}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.updated_at') }}: </strong>
                            {{$show->updated_at}}
                            <br><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.image') }}: </strong>
                            <a href="{{ShowImage($show->image)}}" target="_blank"><img width="90" src="{{ShowImage($show->image)}}" height="60px"></a>
                            <br><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
