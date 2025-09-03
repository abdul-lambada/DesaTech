<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'last_update',
        'icon',
    ];

    public function scopeByIcon($query, $icon)
    {
        return $query->where("icon", $icon);
    }

    public function scopeByLastUpdate($query, $lastUpdate)
    {
        return $query->where("last_update", $lastUpdate);
    }

}
