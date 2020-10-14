@extends('backend.layout.app')

@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
        @endslot
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.show_invite_to_event',['event_id'=>request()->route('event_id')]) }}" class="kt-subheader__breadcrumbs-link">
            {{__('main.show-all') . ' ' . __('main.invites')." ".__('main.to')." ".$event_name}}
        </a>
    @endcomponent
@endsection

@section('content')
    @component('backend.layout.components.form-portlet',['button_name'=>__("main.invite")])

        @slot('title')
            {{ $title }}
        @endslot

        @slot('prevUrl')
            {{ route('admin.users.index') }}
        @endslot

        @slot('vueEvents')
            @click="send()"
        @endslot

        @slot('actions')
            <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
        @endslot

        <form class="kt-form" id="kt_form" action="#" method="get">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    @include('backend.invite._partials._fields', [
                        'action' => 'create',
                    ])
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
    @endcomponent
@endsection

@section('js_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/css/bootstrap-tour-standalone.min.css" integrity="sha256-U3XOxpt3EMRgULgaBrCl51hlDx7GpPZlS6/VSuU9szk=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/js/bootstrap-tour-standalone.min.js" integrity="sha256-yw2gxCA8ajzFaQT3M6OAlc+j+u6louuE91FdCc6Vghg=" crossorigin="anonymous"></script><!--end::Global Theme Bundle -->
    @include('backend.invite._partials._scripts', [
            'action' => 'create',
            'data' => collect(old()),
            'submitUrl' => route('admin.store_invite_to_event'),
        ])
@endsection
