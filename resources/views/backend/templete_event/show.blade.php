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
                            <strong>{{ __('main.templete_name') }}: </strong>
                            {{ $show->templete_name }}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.event_name') }}: </strong>
                            {{ VarByLang(getData(collect($show),"event_name")) }}
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.event_type') }}: </strong>
                            {{ $show->eventType?VarByLang(getData(collect($show->eventType),"name")):"N/A" }}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.address') }}: </strong>
                            {{ VarByLang(getData(collect($show),"address")) }}
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.participations') }}: </strong>
                            {{ $show->participation}}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.agenda') }}: </strong>
                            <a href='{{ asset("uploads/$show->agenda") }}' id="download" class="btn btn-info btn-sm" download> <i class="fa fa-download"></i> </a>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>{{ __('main.event_description') }}: </strong>
                            {{ VarByLang(getData(collect($show),"event_description")) }}
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ __('main.created_at') }}: </strong>
                            {{ $show->created_at}}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.updated_at') }}: </strong>
                            {{ $show->updated_at}}
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-6">
                            <p>
                                <strong>{{ __('main.tags') }}: </strong>
                                <span>
                                     <span>tags</span>
                                </span>
                            </p>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ __('main.image') }}: </strong>
                            <span>
                                                            <a href="{{ShowImage($show->image)}}" target="_blank"><img width="90" src="{{ShowImage($show->image)}}" height="60px"></a>

                            </span>
                            <br><hr>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-6">
                                <div id="google-maps" style="height:100px;"></div>
                        </div>
                    </div>
                </div>

            </div>
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

            </div>
        </div>
    </div>
@endsection
