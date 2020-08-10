<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Address\AddressCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\CarUsers\CarUsersCollection;

class User extends JsonResource
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
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'gender'=>$this->gender,
            //'image'=>$this->image??"",
            "lat"=>$this->lat??"",
            "lang"=>$this->lang??"",
            "prefered_contacts"=>$this->prefered_contacts??"",
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
