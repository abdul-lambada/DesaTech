<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransparencyScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'overall',
        'category',
        'percentage',
        'description',
    ];

    protected $casts = [
        'overall' => 'integer',
        'percentage' => 'integer',
    ];

    public function scopeByOverall($query, $overall)
    {
        return $query->where("overall", $overall);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where("category", $category);
    }

}
