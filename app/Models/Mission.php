<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
    ];

    public function scopeByPriority($query, $priority)
    {
        return $query->where("priority", $priority);
    }

    public function scopeHighPriority($query)
    {
        return $query->where("priority", "high");
    }

}
