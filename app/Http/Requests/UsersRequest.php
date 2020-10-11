<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Helpers\Classes\UserType;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'string'],
            'gender' => ['required', 'in:male,female'],
            'prefered_contacts'=>['nullable',"in:email,phone"],
            'specialty_id'=>['sometimes','nullable','exists:specialties,id']
        ];

        if ($this->method() == 'PATCH') {
            if(request()->has("from")) {
                $rules['email'] = 'required|unique:users,email,' . $this->route()->parameter('user') . ',id';
                $rules['phone'] = 'required|unique:users,phone,' . $this->route()->parameter('user') . ',id';
            }
            else {
                $rules['email'] = 'required|unique:users,email,'.Auth::user()->id.',id';
                $rules['phone'] = 'required|unique:users,phone,'.Auth::user()->id.',id';
            }
            $rules['password'] = 'sometimes|nullable|min:8|confirmed';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name'  =>  trans('main.name'),
            'email'  =>  trans('main.email'),
            'phone'  =>  trans('main.phone'),
            'password'  =>  trans('main.password'),
            'image'  =>  trans('main.image'),
            'gender'  =>  trans('main.gender'),
        ];
    }
}
