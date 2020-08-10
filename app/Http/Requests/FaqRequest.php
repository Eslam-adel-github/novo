<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => ['required'],
            'description' => ['required'],
            'category_faq_id' => ['required', 'exists:category_faqs,id'],
             //'image'           =>'sometimes|image'
        ];

        return $rules;
    }


    public function attributes()
    {
        return [
            'question'  =>  trans('main.question'),
            'description'  =>  trans('main.description'),
            'category_faq_id'  =>  trans('main.category'),
            'image'  =>  trans('main.image'),
        ];
    }
}
