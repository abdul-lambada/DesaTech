<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'description',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

}
