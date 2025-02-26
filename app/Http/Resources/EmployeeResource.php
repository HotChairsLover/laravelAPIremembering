<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'employee_id' => $this->id,
            'employee_firstname' => $this->firstname,
            'employee_lastname' => $this->lastname,
            'employee_role' => new RoleResource($this->role),
            'employee_department' => new DepartmentResource($this->department),
            'employee_company' => new CompanyResource($this->department->company)
        ];
    }
}
