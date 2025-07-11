<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'population',
        'area',
        'density',
    ];

    protected $casts = [
        'year' => 'integer',
        'population' => 'integer',
        'area' => 'decimal:2',
        'density' => 'decimal:2',
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where("year", $year);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy("year", "desc")->first();
    }

}
