<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            "first_name" => ["required", "string", "max:100"],
            "last_name" => ["required", "string", "max:100"],
            "telephone" => ["required", "string", "max:14"],
            "address_1" => ["required", "string", "max:100"],
            "town" => ["required", "string"],
            "postcode" => ["required", "regex:/^[a-z]{1,2}\d[a-z\d]?\s*\d[a-z]{2}$/i"],
            "email" => ["required", "email", "max:100"],
        ];
    }
}
