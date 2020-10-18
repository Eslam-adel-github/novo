<div class="row" id="content_row" data-intro="Some of statistics in website" data-description="Show of Statistics In website">
    @if(\Illuminate\Support\Facades\Auth::user()->type==0)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.video_library.index') }}">{{trans('main.youtube_video_hyper_link')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{\App\YoutubeVideo::count()}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Users For Type == 0 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.rethink_obesity.index') }}">{{trans('main.rethink_obesity')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{\App\RethinkObesity::count()}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-link fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Users For Type == 0 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.users.index') }}">{{trans('main.users')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{\App\User::where("type","<>",0)->count()}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Users For Type == 0 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.event.index') }}">{{trans('main.events')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{\App\Event::count()}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bug fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.faq_library.cards') }}">{{trans('main.faq_library')}} {{trans('main.cards')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.video.cards') }}">{{trans('main.videos')}} {{trans('main.cards')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div id="user-count" class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('admin.events.cards') }}">{{trans('main.events')}} {{trans('main.cards')}}</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ellipsis-v fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div><!-- statistics -->


