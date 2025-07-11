<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'count',
        'percentage',
        'color',
    ];

    protected $casts = [
        'count' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . "%";
    }

}
