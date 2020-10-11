<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSettingsRequest extends FormRequest
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
            "name.ar" => [
                "sometimes",
                "nullable",
                "min:3",
                "max:45",
            ],
            "name.en" => [
                "sometimes",
                "nullable",
                "min:3",
                "max:45",
                "regex:/(^([a-zA-Z0-9\s]+)(\d+)?$)/u"
            ],
            "email" => [
                "sometimes",
                "nullable",
                "string",
                "email",
                "max:255"
            ],
            "facebook" => [
                "sometimes",
                "nullable",
                "url",
            ],
            "twitter" => [
                "sometimes",
                "nullable",
                "url",
            ],
            "linkedin" => [
                "sometimes",
                "nullable",
                "url",
            ],
            "logo" => [
                'image'
            ],
            "icon" => [
                'image'
            ],
            "firebase_credentials" => [
                'nullable',
                'file',
                'mimetypes:application/json',
            ],
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [

            "name.ar"                 => __("main.ar") .' '. __("main.name"),
            "name.en"                 => __("main.en") .' '. __("main.name"),
            "email"                   => __("main.email"),
            "facebook"                => __("main.facebook"),
            "twitter"                 => __("main.twitter"),
            "linkedin"                => __("main.linkedin"),
            "address.ar"              => __("main.ar") .' '. __("main.address"),
            "address.en"              => __("main.en") .' '. __("main.address"),
        ];
    }
}
