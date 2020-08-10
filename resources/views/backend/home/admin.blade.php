@extends('backend.layout.app')
@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{--
            {{Auth::user()->type=='1'?'Vendor':''}} Dashboard
            --}}
        @endslot
    @endcomponent
@endsection
@section('content')
    <div id="dashboard_admin">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="container-fluid">
                {{--
                @include('backend.home._partials.statistics')
                @include('backend.home._partials.charts')
                @include('backend.home._partials.reset_content')
                --}}
            </div>
        </div>
    </div>
@endsection

@section('js_scripts')
    <script src="{{ asset('backend/dist/assets/js/pages/dashboard.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/css/bootstrap-tour-standalone.min.css" integrity="sha256-U3XOxpt3EMRgULgaBrCl51hlDx7GpPZlS6/VSuU9szk=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/js/bootstrap-tour-standalone.min.js" integrity="sha256-yw2gxCA8ajzFaQT3M6OAlc+j+u6louuE91FdCc6Vghg=" crossorigin="anonymous"></script>
    <script>
        new Vue({
            el: '#dashboard_admin',
            mounted() {
                console.log("test");
            },
        });
    </script>
@endsection
