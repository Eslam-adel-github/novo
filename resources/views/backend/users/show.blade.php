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
            {{ __('main.show') }} {{ __('main.users') }}: {{ $show->name }}
        </a>

        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.users.edit', [$show->id]) }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-edit"></i>
                    <span class="kt-nav__link-text">{{ __('main.edit') }} {{ __('main.users') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.users.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __('main.users') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.users.create') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-add"></i>
                    <span class="kt-nav__link-text">{{ __('main.add_new') }} {{trans('main.user')}}</span>
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
                            <strong>{{ __('main.name') }}: </strong>
                            {{ $show->name }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.email') }}: </strong>
                            {{ $show->email }}
                            <br><hr>
                        </div>
                        {{--
                            <div class="col-md-6">
                                <strong>{{ __('main.roles') }}: </strong>
                                @foreach ($show->roles as $role)
                                    <span class="kt-badge kt-badge--brand kt-badge--inline">{{$role->name}}</span>
                                @endforeach
                                <br><hr>
                            </div>
                        --}}
                        <div class="col-md-6">
                            <strong>{{ __('main.phone') }}: </strong>
                            {{ $show->phone }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.gender') }}: </strong>
                            {{ $show->gender }}
                            <br><hr>
                        </div>
                        <!--
                        <div class="col-md-6">
                            <strong>{{ __('main.image') }}: </strong>
                            <a href="{{ ShowImage($show->image) }}" href="#" target="_blank"><img src="{{ ShowImage($show->image) }}" width="35"></a>
                            <br><hr>
                        </div>
                        -->
                        <div class="col-md-6">
                            <strong>{{ __('main.prefered_contacts') }}: </strong>
                            {{ $show->prefered_contacts }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.type') }}: </strong>
                            @if($show->type==0)
                                Admin
                            @elseif($show->type==1)
                                Registered
                            @else
                                HCP
                            @endif
                            <br><hr>
                        </div>
                        @if($show->type==2)
                            <div class="col-md-6">
                                <strong>{{ __('main.specialty') }}: </strong>
                                {{ $show->specaility? VarByLang(getData(collect($show->specaility),"name")) : '' }}
                                <br><hr>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <strong>{{ __('main.created_at') }}: </strong>
                            {{ $show->created_at }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.updated_at') }}: </strong>
                            {{ $show->updated_at }}
                            <br><hr>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
