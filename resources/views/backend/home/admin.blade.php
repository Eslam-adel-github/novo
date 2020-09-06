@extends('backend.layout.app')
@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')

        @endslot
    @endcomponent
@endsection
@section('content')
    <div id="dashboard_admin">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="container-fluid">
                @include('backend.home._partials.statistics')
                @include('backend.home._partials.calendar')
            </div>
        </div>
    </div>
@endsection


