<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'coordinates',
        'description',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

}
