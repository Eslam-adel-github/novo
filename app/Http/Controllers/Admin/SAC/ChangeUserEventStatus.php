<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\EventAttend\EventAttendRepository;
use Illuminate\Http\Request;

class ChangeUserEventStatus extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id,EventAttendRepository $repository)
    {
        $object=$repository->find($id);
         //dd($object);
        if($object->status=="accepted"){
            $data['status']='regected';
        }
        else{
            $data['status']='accepted';
        }
        //dd($data);

        $update=$repository->update($id,$data);

        return $this->apiResponse($update, true, 200);
    }
}
