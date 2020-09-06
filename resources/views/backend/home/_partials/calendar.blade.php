@section('styles')
    <link href="{{ asset('backend/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div class="kt-portlet" id="kt_portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                 <i class="flaticon-map-location"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                {{ __('main.calendar') }}
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div id="kt_calendar"></div>
    </div>
</div>

@section('js_vendors')
    <script src="{{ asset('backend/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
@endsection

@section('js_scripts')
    <script type="text/javascript">
        var KTCalendarBasic = function () {

            return {
                //main function to initiate the module
                init: function () {
                    var todayDate = moment().startOf('day');
                    var YM = todayDate.format('YYYY-MM');
                    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                    var TODAY = todayDate.format('YYYY-MM-DD');
                    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                    var calendarEl = document.getElementById('kt_calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],

                        isRTL: KTUtil.isRTL(),
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },

                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                        nowIndicator: true,
                        now: new Date, // just for demo

                        views: {
                            dayGridMonth: {buttonText: 'month'},
                            timeGridWeek: {buttonText: 'week'},
                            timeGridDay: {buttonText: 'day'}
                        },

                        defaultView: 'dayGridMonth',
                        defaultDate: TODAY,

                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        navLinks: true,
                        events: [

                                @foreach($events as $event)
                            {
                                @php
                                    $YMD = Carbon\Carbon::parse($event->event_date)->format('Y-m-d');
                                    ///$time = Carbon\Carbon::parse($event->event_date . ' ' . $event->event_date)->format('H:i');
                                @endphp
                                title: '{{ VarByLang(getData(collect($event),"event_name"))}}',
                                start: '{{ $YMD }}',
                                backgroundColor: '#000',
                                allDay: false,
                                url: '{{ route('admin.event.show', [$event->id]) }}'
                            },
                            @endforeach
                        ],

                        eventRender: function (info) {
                            var element = $(info.el);

                            if (info.event.extendedProps && info.event.extendedProps.description) {
                                if (element.hasClass('fc-day-grid-event')) {
                                    element.data('content', info.event.extendedProps.description);
                                    element.data('placement', 'top');
                                    KTApp.initPopover(element);
                                } else if (element.hasClass('fc-time-grid-event')) {
                                    element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                                } else if (element.find('.fc-list-item-title').lenght !== 0) {
                                    element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                                }
                            }
                        }
                    });

                    calendar.render();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTCalendarBasic.init();
        });
    </script>
@endsection
