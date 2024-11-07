<?php

namespace App\Http\Requests\Web;

use App\Models\UserRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserReqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return UserRequest::$web_rules;
    }

    public function messages()
    {
        return UserRequest::$messages;
    }
}
