<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdmDimension extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'weight',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
    ];

    public function scopeByWeight($query, $weight)
    {
        return $query->where("weight", $weight);
    }

}
