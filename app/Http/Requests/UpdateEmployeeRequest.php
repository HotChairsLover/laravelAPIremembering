<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends BaseAuthRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'string|min:3|max:99',
            'lastname' => 'string|min:3|max:99',
            'role_id' => 'integer|exists:roles,id',
            'department_id' => 'integer|exists:departments,id'
        ];
    }
}
