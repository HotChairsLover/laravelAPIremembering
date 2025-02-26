<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'company_id');
    }
}
