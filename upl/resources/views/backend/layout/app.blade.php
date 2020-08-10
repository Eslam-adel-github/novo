<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{GetLanguage()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{GetLanguage()}}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{GetLanguage()}}" dir="{{GetDirection()}}">

	<head>
		<meta charset="utf-8" />
		<title>{{ $title }} || </title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="app-url" content="{{ aurl('/') }}">

		<!--begin::Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		@yield('styles')
		<!--end::Page Vendors Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset("backend_additional/dist/assets/plugins/global/plugins.bundle".addRtl().".css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("backend_additional/dist/assets/css/style.bundle".addRtl().".css") }}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->

		<style media="screen">
			.required::after { content:"*"; color: #f4516c; }
			[v-cloak] { display:none; }
			.todoFormContainer {
				background-color: #f9f9fc;
				padding: 10px;
				box-shadow: 2px 2px 4px #f9f9fc;
				border-radius: 5px;
			}
		</style>

		{{-- <style media="print">
			* {display: none;}
		</style> --}}
		@if(GetLanguage() == 'ar')
			<style>
				.lg-outer {
					direction: ltr;
				}
				.vue-form-wizard.md .wizard-navigation .wizard-progress-with-circle {
					transform: rotate(180deg);
				}
			</style>
		@endif
        <style>
            .btn-brand:hover{
                color: white !important;
            }
        </style>
		<link rel="shortcut icon" href="{!! ShowImageFromStorage(null, 'WebsiteSetting-collection', 'avatar') !!}"/>
        @livewireStyles
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

        {{-- <!-- begin::Page loader -->
        @include('backend.layout.globals.loader')
		<!-- end::Page Loader --> --}}

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{ url('/') }}">
					<img height="50px" src="{!! ShowImageFromStorage(null, 'WebsiteSetting-collection', 'avatar') !!}" alt="Logo">
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>
		<!-- end:: Header Mobile -->

		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container  kt-container--fluid ">
							<!-- begin: Header Menu -->
							@include('backend.layout.partials.header-menu.index')
							<!-- end: Header Menu -->
							<!-- begin:: Brand -->
							<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
								<a href="{{ url('admin') }}" class="kt-header__brand-logo">
									<img height="50px" src="{!! ShowImageFromStorage(null, 'WebsiteSetting-collection','') !!}" alt="Logo">
								</a>
							</div>
							<!-- end:: Brand -->

							<!-- begin:: Header Topbar -->
							@include('backend.layout.partials.header-topbar.index')
							<!-- end:: Header Topbar -->
						</div>
					</div>
					<!-- end:: Header -->

					<!-- begin:: Aside -->
					@include('backend.layout.partials.aside.index')
					<!-- end:: Aside -->

					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
							<!-- begin:: Subheader -->
							@yield('sub_header')
							<!-- end:: Subheader -->

							<!-- begin:: Content -->
							<div class="kt-container  kt-grid__item kt-grid__item--fluid">
								@yield("content")
							</div>
							<!-- end:: Content -->
						</div>
					</div>

					<!-- begin:: Footer -->
					@include('backend.layout.partials.footer.index')
					<!-- end:: Footer -->
				</div>
			</div>
		</div>
		<!-- end:: Page -->

		<!-- begin::Quick Panel -->
		{{-- @include('backend.layout.partials.quick_panel.index') --}}
		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>
		<!-- end::Scrolltop -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#591df1",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};

			window.datePickerTranslations = {
				weekdays: [
					'{{ __("main.mon") }}', '{{ __("main.tue") }}', '{{ __("main.wed") }}', '{{ __("main.thu") }}', '{{ __("main.fri") }}', '{{ __("main.sat") }}', '{{ __("main.sun") }}'
				],
				nextMonthCaption: '{{ __("main.next_month") }}',
				prevMonthCaption: '{{ __("main.prev_month") }}',
				setTimeCaption: '{{ __("main.set_time") }}',
				monthes: [
	                '{{ __("main.January") }}', '{{ __("main.February") }}', '{{ __("main.March") }}', '{{ __("main.April") }}',
	                '{{ __("main.May") }}', '{{ __("main.June") }}', '{{ __("main.July") }}', '{{ __("main.August") }}',
	                '{{ __("main.September") }}', '{{ __("main.October") }}', '{{ __("main.November") }}', '{{ __("main.December") }}'
	            ],
				next: '{{ __("main.next") }}',
				prev: '{{ __("main.prev") }}',
			};

			window.trans = @php
	        	// copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
	        	$lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
	        	$trans = [];
		        foreach ($lang_files as $f) {
		            $filename = pathinfo($f)['filename'];
		            $trans[$filename] = trans($filename);
		        }
	        	echo json_encode($trans);
	        @endphp

			window.currentUserId = '{{ auth()->id() }}';

			window.currentDates = {
				year: '{{ date("Y") }}',
				month: '{{ date("m") }}',
				day: '{{ date("d") }}',
				hour: '{{ date("H") }}',
				minute: '{{ date("i") }}',
				second: '{{ date("s") }}',
				date: '{{ date("Y-m-d") }}',
				dateTime: '{{ date("Y-m-d H:i:s") }}',
				time: '{{ date("H:i") }}',
			};
		</script>


		{{-- @routes --}}
		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
        <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
        <script src="{{ asset('backend/dist/assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/dist/assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/shared/js/vue.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/shared/js/helpers.js') }}" type="text/javascript"></script>

        <script src="{{ asset("backend/dist/assets/plugins/custom/datatables/datatables.bundle.js") }}" type="text/javascript"></script>
        <script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>
        <script src="{{ asset("backend/dist/assets/js/pages/custom/wizard/wizard-4.js") }}" type="text/javascript"></script>


        @include('backend.layout.globals.scripts')

		<!--end::Global Theme Bundle -->

		@include('backend.layout.globals.notifications')

        <script>
            $( document ).ready(function() {
                $('.kt-header__topbar-icon').on('click',function(e){
                    e.preventDefault();
                    setTimeout(function() {
                        $('#kt-quick-panel-search').focus();
                        $('#kt-quick-panel-search_lead').focus();
                    }, 100);
                })

            });
        </script>

		<!--begin::Page Vendors(used by this page) -->
		@yield('js_vendors')
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		@yield('js_scripts')
		<!--end::Page Scripts -->
        @livewireScripts

	</body>

	<!-- end::Body -->
</html>
