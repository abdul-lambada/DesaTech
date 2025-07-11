<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'day',
        'month',
        'time',
        'location',
    ];

    public function getFullDateAttribute()
    {
        return "{$this->day} {$this->month}";
    }

    public function getFormattedTimeAttribute()
    {
        return $this->time;
    }

    public function scopeUpcoming($query)
    {
        return $query->orderBy('month', 'asc')
                    ->orderBy('day', 'asc');
    }
}
