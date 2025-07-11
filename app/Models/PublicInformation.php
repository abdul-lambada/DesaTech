<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category',
        'status',
    ];

    public function scopePublished($query)
    {
        return $query->where("status", "published");
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where("category", $category);
    }

}
