<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransparencyIndicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicator',
        'score',
        'category',
    ];

    protected $casts = [
        'score' => 'decimal:2',
    ];

    public function scopeByCategory($query, $category)
    {
        return $query->where("category", $category);
    }

}
