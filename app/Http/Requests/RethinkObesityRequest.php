<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RethinkObesityRequest extends FormRequest
{
    public function authorize()
    {
        // return $this->method() == 'POST' ? userCan("Add Users") : userCan("Edit Users");
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['nullable', 'max:255'],
            'hyper_link' => ['required', 'string',"url"],
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'name'  =>  trans('main.name'),
            'hyper_link'  =>  trans('main.hyper_link'),
        ];
    }
}
