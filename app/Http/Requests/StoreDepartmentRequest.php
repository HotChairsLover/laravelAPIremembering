<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends BaseAuthRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:99',
            'address' => 'required|string|min:3|max:99',
            'director' => 'required|string|min:3|max:99',
            'company_id' => 'required|integer|exists:companies,id'
        ];
    }
}
