@extends('backend.layout.app')

@section('sub_header')
    @component('backend.layout.components.sub-header')

        @slot('title')
            {{  $title }}
        @endslot
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.templete_event.index') }}" class="kt-subheader__breadcrumbs-link">
            {{ __('main.templete_events') }}
        </a>
        @slot('toolbar')
            <li class="kt-nav__item">
                <a href="{{ route('admin.templete_event.edit', [$show->id]) }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-edit"></i>
                    <span class="kt-nav__link-text">{{ __('main.edit') }} {{ __('main.templete_event') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.templete_event.index') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-list-2"></i>
                    <span class="kt-nav__link-text">{{ __('main.show-all') }} {{ __('main.templete_events') }}</span>
                </a>
            </li>
            <li class="kt-nav__item">
                <a href="{{ route('admin.templete_event.create') }}" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon-add"></i>
                    <span class="kt-nav__link-text">{{ __('main.add_new') }} {{ __('main.templete_event') }}</span>
                </a>
            </li>
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="kt-container kt-grid__item kt-grid__item--fluid">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="kt-portlet">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        {{ $show->templete_name }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <div class="row row-no-padding row-col-separator-xl">
                                <div class="col-md-12 col-lg-12 col-xl-4">
                                    <div class="kt-widget1">
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.templete_name") }}</h3>
                                                <span class="kt-widget1__desc">{{ $show->templete_name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget1">
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.event_name") }} (en)</h3>
                                                <span class="kt-widget1__desc">{{ VarByLang(getData(collect($show),"event_name")) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget1">
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.event_name") }} (ar)</h3>
                                                <span class="kt-widget1__desc">{{ VarByLang(getData(collect($show),"event_name"),"ar") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-4">
                                    <div class="kt-widget1">
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.event_description") }} (en)</h3>
                                                <span class="kt-widget1__desc">
                                                    <a  class="kt-widget__username">
                                                        {{ VarByLang(getData(collect($show),"event_description")) }}
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.event_description") }} (ar)</h3>
                                                <span class="kt-widget1__desc">
                                                    <a  class="kt-widget__username">
                                                        {{ VarByLang(getData(collect($show),"event_description"),"ar") }}
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.event_type") }} (en):</h3>
                                                <span class="kt-widget1__desc">{{ $show->eventType?VarByLang(getData(collect($show->eventType),"name")):"" }}</span>
                                            </div>
                                        </div>
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.event_type") }} (ar):</h3>
                                                <span class="kt-widget1__desc">{{ $show->eventType?VarByLang(getData(collect($show->eventType),"name"),"ar"):"" }}</span>
                                            </div>
                                        </div>

                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.tags") }}:</h3>
                                                <span class="kt-widget1__desc">{{$show->tags}}</span>
                                            </div>
                                        </div>

                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.address") }} (en):</h3>
                                                <span class="kt-widget1__desc">{{ VarByLang(getData(collect($show),"address")) }}</span>
                                            </div>
                                        </div>
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.address") }} (ar):</h3>
                                                <span class="kt-widget1__desc">{{ VarByLang(getData(collect($show),"address"),"ar") }}</span>
                                            </div>
                                        </div>
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">{{ __("main.participations") }}:</h3>
                                                <span class="kt-widget1__desc">{{$show->participation}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Info -->
                {{--
                @include('inventories::projects._images',[
                    'fullScreen' => true
                ])
                --}}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        {{ __('main.image') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="kt-portlet__head-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        @if($show->image)
                                            <img width="120px;" height="120px" src="{{asset('uploads/'.$show->image)}}">
                                        @else
                                            <p style="text-align: center">
                                                {{trans('main.no_image_uploaded')}}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        {{ __('main.agenda') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="kt-portlet__head-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        @if($show->agenda !=null)
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th scope="col"> {{ __('main.agenda') }}</th>
                                                    <th scope="col"> {{ __('main.actions') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{ substr($show->agenda,0,50) }}</td>
                                                    <td>
                                                        <a href='{{ asset("uploads/$show->agenda") }}' id="{{ $show->agenda }}" class="btn btn-info btn-sm" download> <i class="fa fa-download"></i> </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @else
                                            {{trans('main.no_agenda_uploaded')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{ __('main.location') }}
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div id="google-maps" style="height:300px;"></div>
                        </div>
                    </div>
                </div><!-- Map -->
                {{--
                @include('inventories::projects._partials._show_page._content_section.tabs.ajax.files')
                --}}

            </div>
        </div>
    </div>
    <!--begin::Modal-->
    <!--end::Modal-->
@endsection

    {{--
    {{ GetSettingByKey('google_map_api_key') }}
    --}}
@section('js_vendors')
    <script src="{{ asset('backend/dist/assets/js/pages/custom/wizard/wizard-2.js') }}" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=" type="text/javascript"></script>
    <script src="{{ asset('backend/dist/assets/js/pages/light-box.js') }}" type="text/javascript"></script>
@endsection

@section('js_scripts')
    <script>
        $(document).ready(function(){
            var marker, i, infowindow = new google.maps.InfoWindow();
            var message = '{{$show->name_val}}', lat = Number('{{ $show->latitude }}'), long = Number('{{ $show->longitude }}');
            var map = new google.maps.Map(document.getElementById('google-maps'), {
                zoom: 14,
                center: new google.maps.LatLng(lat, long),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, long),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(message);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        });
    </script>
@endsection

