<!-- Font Awesome -->

    <style>
        #skills {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 30px auto;
        }

        .circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: absolute;
        }

        .animate {
            -webkit-transition: 0.2s cubic-bezier(.74,1.13,.83,1.2);
            -moz-transition: 0.2s cubic-bezier(.74,1.13,.83,1.2);
            -o-transition: 0.2s cubic-bezier(.74,1.13,.83,1.2);
            transition: 0.2s cubic-bezier(.74,1.13,.83,1.2);
        }

        .animate:hover {
            transform: scale(1.1);
            transform-origin: center center;
        }

        #part1 {
            background-color: #E64C65;
            -webkit-clip-path: polygon(50% 0, 50% 50%, 100% 41.2%, 100% 0);
            clip-path: polygon(50% 0, 50% 50%, 100% 41.2%, 100% 0);
        }

        #part2 {
            background-color: #11A8AB;
            -webkit-clip-path: polygon(50% 50%, 100% 41.2%, 100% 100%, 63.4% 100%);
            clip-path: polygon(50% 50%, 100% 41.2%, 100% 100%, 63.4% 100%);
        }

        #part3 {
            background-color: #4FC4F6;
            -webkit-clip-path: polygon(50% 50%, 36.6% 100%, 63.4% 100%);
            clip-path: polygon(50% 50%, 36.6% 100%, 63.4% 100%);
        }

        #part4 {
            background-color: #FFED0D;
            -webkit-clip-path: polygon(50% 50%, 0 100%, 36.6% 100%);
            clip-path: polygon(50% 50%, 0 100%, 36.6% 100%);
        }

        #part5 {
            background-color: #F46FDA;
            -webkit-clip-path: polygon(50% 50%, 0 36.6%, 0 100%);
            clip-path: polygon(50% 50%, 0 36.6%, 0 100%);
        }

        #part6 {
            background-color: #15BFCC;
            -webkit-clip-path: polygon(50% 50%, 0 36.6%, 0 0, 50% 0);
            clip-path: polygon(50% 50%, 0 36.6%, 0 0, 50% 0);
        }
    </style>

<div class="row">
    <!--
    <div class="col-lg-4 col-xl-4 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                <div class="kt-widget14__header kt-margin-b-30">
                    <h3 class="kt-widget14__title">
                        Daily Sales
                    </h3>
                    <span class="kt-widget14__desc">
                        Check out each collumn for more details
                    </span>
                </div>
                <div class="kt-widget14__chart" style="height:120px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="kt_chart_daily_sales"
                        style="display: block; width: 267px; height: 120px;" width="267" height="120"
                        class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
    -->


    <div class="col-lg-6 col-xl-6 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                        Most Orders Products
                    </h3>
                    <span class="kt-widget14__desc">
                       Most Orders Products
                    </span>
                </div>
                {{--
                <div class="kt-widget14__content">
                    <div class="kt-widget14__chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="kt-widget14__stat">45</div>
                        <canvas id="kt_chart_profit_share"
                            style="height: 140px; width: 140px; display: block;" width="140"
                            height="140" class="chartjs-render-monitor"></canvas>
                    </div>

                    <div class="kt-widget14__legends">
                        @foreach( $productsByMonth as $my)
                        <div class="kt-widget14__legend">
                            <span class="kt-widget14__bullet kt-bg-success"></span>
                            <span class="kt-widget14__stats">{{date("F", mktime(0, 0, 0,$my->month, 10))}}</span>
                        </div>
                        @endforeach
                    </div>

                </div>
            --}}
                <div class="kt-widget14__content">
                    <div class="">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Profit Share -->



    <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                        Order Status
                    </h3>
                    <span class="kt-widget14__desc">
                        Order Status Numbers
                    </span>
                </div>
                <div class="kt-widget14__content">
                    <div class="">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>


            </div>
        </div>
    </div><!-- Revenue Change -->
</div><!-- Charts -->
<!--  'pending', 'shipped', 'fulfilled', 'cancelled'. -->
@section('js_scripts')
    <script>
        var ctx = document.getElementById('myChart');
        var ctx = document.getElementById('myChart').getContext('2d');
        var ctx = $('#myChart');
        var ctx = 'myChart';
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['pending', 'shipped', 'fulfilled', 'cancelled'],
                datasets: [{
                    label: '# of Votes',
                    data:@json($toatal_status_count),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 0, 0, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart2');
        var ctx = document.getElementById('myChart2').getContext('2d');
        var ctx = $('#myChart');
        var ctx = 'myChart2';
        console.log("data ",@json($get_most_orders_product));
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($get_most_orders_product["product"]),
                datasets: [{
                    label: '# of Votes',
                    data:@json($get_most_orders_product["count"]),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 0, 0, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
