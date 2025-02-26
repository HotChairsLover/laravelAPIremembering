<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends BaseAuthRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|min:3|max:99',
            'lastname' => 'required|string|min:3|max:99',
            'role_id' => 'required|integer|exists:roles,id',
            'department_id' => 'required|integer|exists:departments,id'
        ];
    }
}
