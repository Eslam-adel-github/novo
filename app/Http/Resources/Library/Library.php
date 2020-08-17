<?php

namespace App\Http\Resources\Library;

use App\Http\Resources\CategoryLibrary\CategoryLibrary;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Library extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "category" => new CategoryLibrary($this->category),
            "image" =>$this->image?"uploads/". $this->image:null
        ];
    }
}
