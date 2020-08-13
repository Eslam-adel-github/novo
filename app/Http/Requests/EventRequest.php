<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        $rules = [
            'event_name' => ['required'],
            'event_description' => ['required'],
            'address'     => ['required'],
            'image'      =>['sometimes','nullable'],
            'agenda'      =>['sometimes','nullable'],
            'event_type_id'=>['required','exists:event_types,id'],
            "participation"=>'required|in:'.implode(',', getParticipations()),
            'event_date'=>['required','date','after_or_equal:today']
        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'event_name' => trans('main.event_name'),
            'event_description' => trans('main.event_description'),
            'address'     => trans('main.address'),
            'event_type_id'=>trans('main.event_type'),
            "participation"=>trans('main.participation'),
            'event_date'=>trans('main.event_date'),
        ];
    }
}
