<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boundary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coordinates',
        'area',
    ];

    protected $casts = [
        'area' => 'decimal:2',
    ];

    public function scopeByName($query, $name)
    {
        return $query->where("name", $name);
    }

}
