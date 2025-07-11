<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverviewStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'value',
        'change',
    ];

    public function hasChange(): bool
    {
        return !empty($this->change);
    }

    public function isPositiveChange(): bool
    {
        return $this->change && str_contains($this->change, '+');
    }

    public function isNegativeChange(): bool
    {
        return $this->change && str_contains($this->change, '-');
    }

    public function scopeByLabel($query, $label)
    {
        return $query->where('label', $label);
    }
}
