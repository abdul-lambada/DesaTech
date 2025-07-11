<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LetterService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'duration',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(LetterServiceRequirement::class);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function getFormattedDurationAttribute()
    {
        return $this->duration;
    }
}
