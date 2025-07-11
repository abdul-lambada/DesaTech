<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipientCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'criteria',
    ];

    public function scopeByName($query, $name)
    {
        return $query->where("name", $name);
    }

}
