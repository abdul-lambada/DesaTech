<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'period',
        'file_path',
        'description',
    ];

    public function scopeByPeriod($query, $period)
    {
        return $query->where("period", $period);
    }

}
