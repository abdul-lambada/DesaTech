<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicator',
        'score',
        'weight',
        'category',
    ];

    protected $casts = [
        'score' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    public function scopeByCategory($query, $category)
    {
        return $query->where("category", $category);
    }

    public function getWeightedScoreAttribute()
    {
        return $this->score * $this->weight;
    }

}
