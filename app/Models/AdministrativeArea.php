<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'population',
        'area',
    ];

    protected $casts = [
        'population' => 'integer',
        'area' => 'decimal:2',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

}
