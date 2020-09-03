@extends('backend.layout.app')


@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot

        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.pharmacy.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.pharmacies') }}
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
            {{ __('main.show') }} {{ __('main.pharmacy') }} #: {{VarByLang(getData(collect($show),"name"))}}
        </a>

        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.pharmacy.edit', [$show->id]) }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-edit"></i>
                    <span class="kt-nav__link-text">{{ __('main.edit') }} {{ __('main.pharmacy') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.pharmacy.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __('main.pharmacies') }}</span>
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
                            {{ VarByLang(getData(collect($show),"name")) }}
                            <br>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.name') }} (ar): </strong>
                            {{ VarByLang(getData(collect($show),"name"),"ar") }}
                            <br>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.working_hour') }}: </strong>
                            {{ VarByLang(getData(collect($show),"working_hour")) }}
                            <br>
                            <hr>
                        </div>
                        <div class="col-6">
                            <p>
                                <strong>{{ __('main.contacts') }}: </strong>
                                @if (checkVar($show->contacts) && is_array(json_decode($show->contacts, true)) && count(json_decode($show->contacts, true)))
                                    @foreach (json_decode($show->contacts, true) ?? [] as $landline)
                                        <span>
                                            {{ $landline['number'] }}
                                        </span>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.notes') }}: </strong>
                            {{$show->notes}}
                            <br>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.created_at') }}: </strong>
                            {{$show->created_at}}
                            <br>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.updated_at') }}: </strong>
                            {{$show->updated_at}}
                            <br>
                            <hr>
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
