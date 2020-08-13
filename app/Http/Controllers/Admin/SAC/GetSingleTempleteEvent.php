<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TempleteEvent\TempleteEventRepository;
use App\TempleteEvent;
use Illuminate\Http\Request;

class GetSingleTempleteEvent extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($parameter,TempleteEventRepository $repository)
    {
        if($parameter=="create_custom"){
            $templete=new TempleteEvent();
            $templete->event_name='';
            $templete->event_description='';
            $templete->address='';
            $templete->participation='';
            $templete->event_type_id='';
            $templete->tags=[];
            return $this->apiResponse($templete);
        }
        $templete=$repository->find($parameter);
        $templete->tags=$templete->tags !=''?collect(explode(',',$templete->tags))->map(function ($item){
            return [
                'key' => $item,
                'value' => $item,
            ];
        }):[];
        return $this->apiResponse($templete);
    }
}
