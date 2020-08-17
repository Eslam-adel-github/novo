<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\EventType\EventType;
use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "event_name" => $this->event_name,
            "event_description" => $this->event_description,
            'event_type'=> new EventType($this->eventType),
            'lat'=>$this->latitude,
            'lang'=>$this->longitude,
            'event_date'=>$this->event_date,
            "image" =>$this->image?"uploads/". $this->image:null,
            "agenda" =>$this->agenda?"uploads/". $this->agenda:null,
            'address'=>$this->address,
            'number_attendance'=>$this->numberOfAttendance()->count(),
            'user_applied_to_this_event'=>(boolean)$this->userAppliedToThisEvent()->count()
        ];
    }
}
