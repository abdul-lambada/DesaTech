<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'aspect',
        'score',
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    public function scopeByAspect($query, $aspect)
    {
        return $query->where("aspect", $aspect);
    }

    public function scopeByScore($query, $score)
    {
        return $query->where("score", $score);
    }

}
