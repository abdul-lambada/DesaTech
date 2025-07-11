<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'significance',
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where("year", $year);
    }

    public function scopeChronological($query)
    {
        return $query->orderBy("year", "asc");
    }

}
