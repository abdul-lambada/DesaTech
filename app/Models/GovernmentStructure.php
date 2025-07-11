<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'name',
        'description',
        'level',
    ];

    public function scopeByLevel($query, $level)
    {
        return $query->where("level", $level);
    }

}
