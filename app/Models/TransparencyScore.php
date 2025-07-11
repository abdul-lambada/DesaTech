<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransparencyScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'score',
        'category',
    ];

    protected $casts = [
        'year' => 'integer',
        'score' => 'decimal:2',
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where("year", $year);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where("category", $category);
    }

}
