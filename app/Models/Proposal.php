<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'budget',
        'status',
        'submitted_by',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
    ];

    public function scopeByStatus($query, $status)
    {
        return $query->where("status", $status);
    }

    public function scopePending($query)
    {
        return $query->where("status", "pending");
    }

    public function scopeApproved($query)
    {
        return $query->where("status", "approved");
    }

}
