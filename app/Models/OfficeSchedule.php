<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'open_time',
        'close_time',
        'is_open',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function scopeOpen($query)
    {
        return $query->where("is_open", true);
    }

    public function getFormattedTimeAttribute()
    {
        return $this->open_time . " - " . $this->close_time;
    }

}
