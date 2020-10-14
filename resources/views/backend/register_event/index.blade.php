@extends('backend.layout.app')

@section('styles')
    <link href="{{ asset('backend/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.event.show',['event'=>request()->route('event_id')]) }}" class="kt-subheader__breadcrumbs-link">
            {{__('main.show') . ' ' . __('main.event')}}
        </a>
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            {{ $title }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    {!! $dataTable->table(['class' => 'table table-striped table-bordered table-hover table-checkable'], true) !!}
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_scripts')
    {!! $dataTable->scripts() !!}

    <script>
        let Inde =x = new Vue({
            methods:{
                deleteUser(){
                console.log('asdasd')
            },

            }
        })
        </script>
@endsection
