<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetOverview extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'total_budget',
        'realized_budget',
        'percentage',
    ];

    protected $casts = [
        'year' => 'integer',
        'total_budget' => 'decimal:2',
        'realized_budget' => 'decimal:2',
        'percentage' => 'decimal:2',
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where("year", $year);
    }

    public function getRemainingBudgetAttribute()
    {
        return $this->total_budget - $this->realized_budget;
    }

}
