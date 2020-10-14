<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "type"=>["required","in:Specialty,Specific Doctors"],
            'specialty_id'=>['sometimes','nullable','required_if:type,==,Specialty','exists:specialties,id'],
            'doctors_id.*'=>['sometimes','nullable','required_if:type,==,Specific Doctors','exists:users,id']
        ];
    }
    public function attributes()
    {
        return [
            'type'  =>  trans('main.type'),
            'specialty_id'  =>  trans('main.specialty'),
            'doctors_id'  =>  trans('main.doctors'),
        ];
    }
}
