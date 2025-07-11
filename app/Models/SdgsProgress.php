<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdgsProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal',
        'target',
        'progress',
        'status',
    ];

    protected $casts = [
        'progress' => 'decimal:2',
    ];

    public function scopeByGoal($query, $goal)
    {
        return $query->where("goal", $goal);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where("status", $status);
    }

}
