<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'count',
    ];

    protected $casts = [
        'count' => 'integer',
    ];

    public function letterServices(): HasMany
    {
        return $this->hasMany(LetterService::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('count', '>', 0);
    }

    public function incrementServiceCount()
    {
        $this->increment('count');
    }

    public function decrementServiceCount()
    {
        $this->decrement('count');
    }
}
