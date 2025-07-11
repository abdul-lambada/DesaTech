<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilySize extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'count',
        'percentage',
        'color',
    ];

    protected $casts = [
        'count' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeBySize($query, $size)
    {
        return $query->where("size", $size);
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . "%";
    }

}
