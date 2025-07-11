<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
    ];

    public function scopeUnread($query)
    {
        return $query->where("read", false);
    }

    public function markAsRead()
    {
        $this->update(["read" => true]);
    }

}
