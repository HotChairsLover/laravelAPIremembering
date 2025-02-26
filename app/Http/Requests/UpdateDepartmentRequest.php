<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends BaseAuthRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max:99',
            'address' => 'string|min:3|max:99',
            'director' => 'string|min:3|max:99',
            'company_id' => 'integer|exists:companies,id'
        ];
    }
}
