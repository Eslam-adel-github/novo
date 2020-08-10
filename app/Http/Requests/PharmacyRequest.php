<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends FormRequest
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

    public function rules()
    {
        $rules = [
            'name' => ['required'],
            'working_hour' => ['required'],
            'notes' => ['required'],
            'contacts.*.number'     => 'required'
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'contacts.*' => 'The Contact is Invalid Number'
        ];
    }

    public function attributes()
    {
        return [
            'name'  =>  trans('main.name'),
            'working_hour'  =>  trans('main.working_hour'),
            'notes'  =>  trans('main.notes'),
            'contact'  =>  trans('main.contact'),
        ];
    }
}
