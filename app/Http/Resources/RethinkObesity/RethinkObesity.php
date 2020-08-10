<?php

namespace App\Http\Resources\RethinkObesity;

use Illuminate\Http\Resources\Json\JsonResource;

class RethinkObesity extends JsonResource
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
            'id'=>$this->id,
            'name'=>count($this->name)==0?null:$this->name,
            'hyper_link'=>$this->hyper_link,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
