<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'budget',
        'beneficiaries',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'beneficiaries' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where("status", "active");
    }

}
