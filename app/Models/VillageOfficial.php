<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'phone',
        'email',
        'photo',
    ];

    public function scopeByPosition($query, $position)
    {
        return $query->where("position", $position);
    }

}
