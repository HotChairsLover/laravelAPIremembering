<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'department_id' => $this->id,
            'department_name' => $this->name,
            'department_director' => $this->director,
            'department_address' => $this->address
        ];
    }
}
