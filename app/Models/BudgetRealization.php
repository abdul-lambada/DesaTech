<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BudgetRealization extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'planned',
        'realized',
        'percentage',
    ];

    protected $casts = [
        'planned' => 'decimal:2',
        'realized' => 'decimal:2',
        'percentage' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BudgetCategory::class);
    }

    public function getVarianceAttribute()
    {
        return $this->realized - $this->planned;
    }

}
