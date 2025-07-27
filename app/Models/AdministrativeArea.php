<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'rw',
        'total_kk',
    ];

    protected $casts = [
        'total_kk' => 'integer',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

}
