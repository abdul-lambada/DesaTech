<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector',
        'count',
        'percentage',
        'color',
    ];

    protected $casts = [
        'count' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeBySector($query, $sector)
    {
        return $query->where("sector", $sector);
    }

    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . "%";
    }

}
