<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category', 'name');
    }

    public function getNewsCountAttribute()
    {
        return $this->news()->count();
    }
}
