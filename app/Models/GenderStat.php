<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderStat extends Model
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
        return $query->where('type', $type);
    }

    public function scopeMale($query)
    {
        return $query->where('type', 'male');
    }

    public function scopeFemale($query)
    {
        return $query->where('type', 'female');
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . '%';
    }
}
