<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeRt extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrative_area_id',
        'number',
        'head',
    ];

    protected $casts = [
        'head' => 'integer',
    ];

    public function scopeByRt($query, $rt)
    {
        return $query->where("rt_number", $rt);
    }

    public function scopeByRw($query, $rw)
    {
        return $query->where("rw_number", $rw);
    }

    public function administrativeArea()
    {
        return $this->belongsTo(AdministrativeArea::class);
    }

}
