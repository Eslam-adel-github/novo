<?php

namespace App\Http\Resources\Faq;

use App\Http\Resources\CategoryFaq\CategoryFaq;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Faq extends JsonResource
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
            "title" => $this->question,
            "description" => $this->description,
            "category" => new CategoryFaq($this->category),
            "image" => $this->image
        ];
    }
}
