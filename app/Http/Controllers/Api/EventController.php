<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendEventRequest;
use App\Http\Resources\Event\Event;
use App\Http\Resources\Event\EventCollection;
use App\Repositories\Eloquent\Event\EventRepository;
use App\Repositories\Eloquent\EventAttend\EventAttendRepository;
use App\Services\AttendEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }

    /**
     * Handle the incoming request.
     * @return Response
     */
    public function index(Request $request)
    {
       $events_to_show_top=$this->repository->instance()->orderBy('event_date','asc')->paginate();
        $data['events_to_show_top']=new EventCollection($events_to_show_top);
       $data['filter_by_date']=[];
       if($request->filled('event_date')){
           $filter_by_date=$this->repository->instance()->where('event_date',$request->event_date)->orderBy('event_date','asc')->paginate();
           $data['filter_by_date']=new EventCollection($filter_by_date);
       }
        return $this->apiResponse($data, true, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $show = $this->repository->find($id);
        return $this->apiResponse(new Event($show), true, 200);
    }
    public function attendEvent(AttendEventRequest $request,AttendEvent $service,EventAttendRepository $repository)
    {
        $request['user_id']=auth()->user()->id;
        $data_to_compare=$request->all();
        if(!$repository->instance()->where($data_to_compare)->exists()) {
            $store = $service->store($request);
            if (!$store) {
                $data["message"] = "Error";
                return $this->apiResponse($data, true, 422);
            }
        }
        $data["message"]="added successfully";
        return $this->apiResponse($data, true, 200);
    }
    public function getEventsByCallender(Request $request){

        $filter_by_date=$this->repository->instance()->where('event_date',$request->event_date)->orderBy('event_date','asc')->paginate();

        $data['filter_by_date']=new EventCollection($filter_by_date);

        return $this->apiResponse($data, true, 200);
    }
}
