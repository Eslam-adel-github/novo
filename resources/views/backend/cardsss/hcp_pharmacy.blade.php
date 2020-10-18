@extends('backend.layout.app')

@section('styles')
    <link href="{{ asset('backend/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('sub_header')
    @component('backend.layout.components.sub-header')
        @slot('title')
            {{ $title }}
        @endslot
    @endcomponent
@endsection

@section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="row">
                <div class="col-lg-4">
                    <div class="kt-portlet kt-iconbox kt-iconbox--animate">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3,3 L21,3 C21.5522847,3 22,3.44771525 22,4 L22,11 C22,11.5522847 21.5522847,12 21,12 L3,12 C2.44771525,12 2,11.5522847 2,11 L2,4 C2,3.44771525 2.44771525,3 3,3 Z M5,8 C4.44771525,8 4,8.44771525 4,9 C4,9.55228475 4.44771525,10 5,10 L19,10 C19.5522847,10 20,9.55228475 20,9 C20,8.44771525 19.5522847,8 19,8 L5,8 Z" fill="#000000"/>
                                            <path d="M17.2914283,14.2943612 L18.7085717,15.7056388 C17.6611931,16.7573706 17.6647221,18.4590358 18.7164539,19.5064144 C18.8065164,19.5961041 18.902828,19.6792918 19.0046636,19.755351 L19.5984004,20.1988028 L18.4015996,21.8011972 L17.8078628,21.3577454 C17.6302443,21.2250852 17.4622605,21.0799918 17.3051762,20.9235577 C15.4707777,19.096752 15.4646226,16.1287596 17.2914283,14.2943612 Z M11.2914283,15.2943612 L12.7085717,16.7056388 C11.6611931,17.7573706 11.6647221,19.4590358 12.7164539,20.5064144 C12.8065164,20.5961041 12.902828,20.6792918 13.0046636,20.755351 L13.5984004,21.1988028 L12.4015996,22.8011972 L11.8078628,22.3577454 C11.6302443,22.2250852 11.4622605,22.0799918 11.3051762,21.9235577 C9.47077775,20.096752 9.4646226,17.1287596 11.2914283,15.2943612 Z M5.29142832,14.2943612 L6.70857168,15.7056388 C5.66119311,16.7573706 5.66472209,18.4590358 6.71645389,19.5064144 C6.80651638,19.5961041 6.90282804,19.6792918 7.00466363,19.755351 L7.59840039,20.1988028 L6.40159961,21.8011972 L5.80786284,21.3577454 C5.63024431,21.2250852 5.46226047,21.0799918 5.30517622,20.9235577 C3.47077775,19.096752 3.4646226,16.1287596 5.29142832,14.2943612 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-iconbox__desc">
                                    <h3 class="kt-iconbox__title">
                                        <a class="kt-link" href="{{ route('admin.HCP.index') }}">{{ trans('main.HCP') }}</a>
                                    </h3>
                                    <div class="kt-iconbox__content">
                                        {{ __('main.hcp_description') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="kt-portlet kt-iconbox kt-iconbox--animate">
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3,3 L21,3 C21.5522847,3 22,3.44771525 22,4 L22,11 C22,11.5522847 21.5522847,12 21,12 L3,12 C2.44771525,12 2,11.5522847 2,11 L2,4 C2,3.44771525 2.44771525,3 3,3 Z M5,8 C4.44771525,8 4,8.44771525 4,9 C4,9.55228475 4.44771525,10 5,10 L19,10 C19.5522847,10 20,9.55228475 20,9 C20,8.44771525 19.5522847,8 19,8 L5,8 Z" fill="#000000"/>
                                            <path d="M17.2914283,14.2943612 L18.7085717,15.7056388 C17.6611931,16.7573706 17.6647221,18.4590358 18.7164539,19.5064144 C18.8065164,19.5961041 18.902828,19.6792918 19.0046636,19.755351 L19.5984004,20.1988028 L18.4015996,21.8011972 L17.8078628,21.3577454 C17.6302443,21.2250852 17.4622605,21.0799918 17.3051762,20.9235577 C15.4707777,19.096752 15.4646226,16.1287596 17.2914283,14.2943612 Z M11.2914283,15.2943612 L12.7085717,16.7056388 C11.6611931,17.7573706 11.6647221,19.4590358 12.7164539,20.5064144 C12.8065164,20.5961041 12.902828,20.6792918 13.0046636,20.755351 L13.5984004,21.1988028 L12.4015996,22.8011972 L11.8078628,22.3577454 C11.6302443,22.2250852 11.4622605,22.0799918 11.3051762,21.9235577 C9.47077775,20.096752 9.4646226,17.1287596 11.2914283,15.2943612 Z M5.29142832,14.2943612 L6.70857168,15.7056388 C5.66119311,16.7573706 5.66472209,18.4590358 6.71645389,19.5064144 C6.80651638,19.5961041 6.90282804,19.6792918 7.00466363,19.755351 L7.59840039,20.1988028 L6.40159961,21.8011972 L5.80786284,21.3577454 C5.63024431,21.2250852 5.46226047,21.0799918 5.30517622,20.9235577 C3.47077775,19.096752 3.4646226,16.1287596 5.29142832,14.2943612 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-iconbox__desc">
                                    <h3 class="kt-iconbox__title">
                                        <a class="kt-link" href="{{ route('admin.pharmacy.index') }}">{{ trans("main.pharmacy") }}</a>
                                    </h3>
                                    <div class="kt-iconbox__content">
                                        {{ __('main.pharmacy_description') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- end:: Content -->
@endsection
