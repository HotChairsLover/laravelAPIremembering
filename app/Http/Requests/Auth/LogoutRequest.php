<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseAuthRequest;

class LogoutRequest extends BaseAuthRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
