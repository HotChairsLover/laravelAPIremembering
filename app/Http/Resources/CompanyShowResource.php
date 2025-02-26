<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'company_id' => $this->id,
            'company_name' => $this->name,
            'company_departments' => DepartmentResource::collection($this->departments)
        ];
    }
}
