<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
    ];

    public function scopeByTitle($query, $title)
    {
        return $query->where("title", $title);
    }

    public function scopeByIcon($query, $icon)
    {
        return $query->where("icon", $icon);
    }

}
