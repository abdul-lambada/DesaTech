<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'allocation',
    ];

    protected $casts = [
        'allocation' => 'decimal:2',
    ];

    public function scopeByAllocation($query, $min, $max)
    {
        return $query->whereBetween("allocation", [$min, $max]);
    }

}
