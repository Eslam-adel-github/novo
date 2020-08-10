<div class="row" id="content_row" data-intro="Some of statistics in website" data-description="Show of Statistics In website">
    @if(Auth::user()->type==0)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" data-intro="Number of users " data-description="Show Number Of users"
                    class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route(userType()::prefix().'users.index') }}">Users</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{\App\User::where("type","<>",0)->count()}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Users For Type == 0 -->
    @endif

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body" id="product_count" data-intro="Number Of Product in website"
                data-description="Show number of products in website">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            {{Auth::user()->type=='1'?'My':''}} <a href="{{ route(userType()::prefix().'products.index') }}">Products</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @vendor
                                {{\App\Product::where("vendor_id",Auth::user()->id)->count()}}
                            @endvendor
                            @admin
                                {{\App\Product::count()}}
                            @endadmin
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Products For User Type == 1 -->

    @if(Auth::user()->type==0)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div id="category_count" data-intro="Number Of Category in website"
                    data-description="Show number of categories in website" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="{{ route(userType()::prefix().'categories.index') }}">Category</a> </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{\App\Category::count()}}</div>
                                </div>
                                <div class="col">
                                    <div style="display:none" class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Categories For User Type == 0 -->
    @endif

    @if(Auth::user()->type==0)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body" id="model_count" data-intro="Number Of models in website"
                    data-description="Show number of models in website">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="{{ route(userType()::prefix().'product_models.index') }}">Product Model</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{\App\ProductModel::count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Product Models For User Type == 0 -->
    @endif

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body" id="order_count" data-intro="Number Of Orders in website"
                data-description="Show number of orders in website">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            @if(Auth::user()->type ==0)
                                <a href="{{ route(userType()::prefix().'orders.index') }}">Orders</a>
                            @else
                                <a href="{{ route(userType()::prefix().'manage.vendor.user.order') }}">My Orders</a>
                            @endif
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{--  {{\App\Order::where("vendor_id",Auth::user()->id)->count()}} --}}@if(Auth::user()->type==userType()::vendor) {{Auth::user()->get_orders_count()->count()}} @else {{\App\Pivot\OrderProduct::count()}} @endif</div>
                            </div>
                            <div class="col">
                                <div style="display: none;" class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style=" width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Orders For User Type == 0 -->
    @admin
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div id="reviews_count" data-intro="Number Of reviews in website"
                data-description="Show number of reviews in website" class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="{{ route(userType()::prefix().'product_makes.index') }}">Product Make</a></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{\App\ProductMake::count()}}
                                    {{--
                                    @if(Auth::user()->type==0) {{\App\Review::count()}} ({{round(\App\Review::avg("rate"),2)}}) @else {{round(Auth::user()->get_vendor_reviews_count(),0)}} ({{round(Auth::user()->get_vendor_reviews(),0)}}) @endif
                                   --}}
                                </div>
                            </div>
                            {{--
                            <div  style="display: none" class="col">
                                <div class="progress progress-sm mr-2">
                                    @if(Auth::user()->type==userType()::admin)
                                        @php
                                          $average_rate=\App\Review::avg("rate");
                                        @endphp
                                    @elseif(Auth::user()->type==userType()::vendor)
                                        @php
                                            $average_rate=Auth::user()->get_vendor_reviews()
                                        @endphp
                                    @endif
                                        <div  class="progress-bar col-sm-2 @if($average_rate>=4)  bg-green @elseif($average_rate<4 && $average_rate>=2.5) bg-yellow @else bg-red @endif " role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- Reviews For User Type == 0 -->
    @endadmin

        <div style="display: none" class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" id="order_count_cancelled" data-intro="Number Of Orders Cancelled in website"
                     data-description="Show number of orders in website">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> {{Auth::user()->type==userType()::vendor?'My ':''}}Cancelled Orders</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                        @php
                                           $cancelled_order_object=new \App\Statistics\Dashboard();
                                           $cancelled_count=$cancelled_order_object->get_product_order_status("count","cancelled")
                                        @endphp
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{--  {{\App\Order::where("vendor_id",Auth::user()->id)->count()}} --}}{{$cancelled_count}}</div>
                                </div>
                                <div class="col">
                                    <div style="display: none;" class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style=" width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Orders For User Type == 0 -->
        <!-- Orders For User Type == 0 -->

        @vendor
        @php
            $total_revenue_object=new \App\Statistics\Dashboard();
            $status_array=array('pending', 'shipped', 'fulfilled', 'cancelled');
            //dd($total_revenue);
        @endphp
        @foreach($status_array as$key=>$value)
            @php
                $total_revenue=$total_revenue_object->getTotalRevenue($value);
            @endphp
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body" id="order_count_cancelled" data-intro="Number Of Orders Cancelled in website"
                     data-description="Show number of orders in website">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> {{Auth::user()->type==userType()::vendor?'My ':''}}Total {{ucfirst($value)}} Orders</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{--  {{\App\Order::where("vendor_id",Auth::user()->id)->count()}} --}}{{$total_revenue}}</div>
                                </div>
                                <div class="col">
                                    <div style="display: none;" class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style=" width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endvendor

</div><!-- statistics -->
{{--
<canvas id="myChart" width="400" height="400"></canvas>
@section('js_scripts')
    <script>
        var ctx = document.getElementById('myChart');
        var ctx = document.getElementById('myChart').getContext('2d');
        var ctx = $('#myChart');
        var ctx = 'myChart';
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
--}}

