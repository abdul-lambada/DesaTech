<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'count',
        'percentage',
        'color',
    ];

    protected $casts = [
        'count' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeByLevel($query, $level)
    {
        return $query->where("level", $level);
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . "%";
    }

}
