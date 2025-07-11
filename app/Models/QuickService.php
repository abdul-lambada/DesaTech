<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'url',
    ];

    public function scopeActive($query)
    {
        return $query->where("status", "active");
    }

}
