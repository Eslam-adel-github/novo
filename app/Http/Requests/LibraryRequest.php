<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'category_library_id' => ['required', 'exists:category_libraries,id'],
            //'image'           =>'sometimes|image'
        ];

        return $rules;
    }


    public function attributes()
    {
        return [
            'title'  =>  trans('main.title'),
            'description'  =>  trans('main.description'),
            'category_library_id'  =>  trans('main.category'),
            'image'  =>  trans('main.image'),
        ];
    }
}
