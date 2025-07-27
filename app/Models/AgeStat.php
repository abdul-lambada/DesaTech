<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'range',
        'count',
        'percentage',
    ];

    protected $casts = [
        'count' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeByRange($query, $range)
    {
        return $query->where("range", $range);
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . "%";
    }

}
