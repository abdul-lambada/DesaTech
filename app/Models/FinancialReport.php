<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'date',
        'size',
        'icon',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

    public function scopeByDate($query, $date)
    {
        return $query->where("date", $date);
    }

}
