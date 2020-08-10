<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordRequest extends FormRequest
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
            'password' => ['required',"confirmed",'min:8'],
            'old_password' => ['required',function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail($attribute.' didn\'t match');
                }
            },],
        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'password'  =>  trans('main.password'),
            'old_password'  =>  trans('main.old_password'),
        ];
    }
}
