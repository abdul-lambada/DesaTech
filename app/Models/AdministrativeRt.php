<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeRt extends Model
{
    use HasFactory;

    protected $fillable = [
        'rt_number',
        'rw_number',
        'head_name',
        'population',
    ];

    protected $casts = [
        'rt_number' => 'integer',
        'rw_number' => 'integer',
        'population' => 'integer',
    ];

    public function scopeByRt($query, $rt)
    {
        return $query->where("rt_number", $rt);
    }

    public function scopeByRw($query, $rw)
    {
        return $query->where("rw_number", $rw);
    }

}
