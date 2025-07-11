<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'history',
        'vision',
        'mission',
    ];

    public function scopeByName($query, $name)
    {
        return $query->where("name", $name);
    }

}
