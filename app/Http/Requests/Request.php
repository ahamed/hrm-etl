<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function messages()
    {
        return [
            'email.required' => 'Er, you forgot your email address!',
            'email.unique' => 'Email already taken m8',
        ];
    }
}
