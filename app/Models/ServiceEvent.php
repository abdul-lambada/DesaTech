<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function scopeUpcoming($query)
    {
        return $query->where("date", ">=", now())->orderBy("date");
    }

    public function scopePast($query)
    {
        return $query->where("date", "<", now())->orderBy("date", "desc");
    }

}
