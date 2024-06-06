<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegsterAdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Admin_Id'=>[ 'string'],
            'Admin_Name'=>[ 'string'],
           'Admin_Surname'=>['string'],
           'Admin_Phone'=>[ 'string'],
           'Admin_Type'=>[ 'string'],
           'Admin_Email' => ['required', 'email', 'max:255'],
           'Admin_Password'=> ['required'],
        ];
    }
}
