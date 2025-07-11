<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'age_group',
        'count',
        'percentage',
        'color',
    ];

    protected $casts = [
        'count' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeByAgeGroup($query, $ageGroup)
    {
        return $query->where("age_group", $ageGroup);
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . "%";
    }

}
