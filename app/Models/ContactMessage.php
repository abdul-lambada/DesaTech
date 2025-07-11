<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];

    public function scopeUnread($query)
    {
        return $query->where("status", "unread");
    }

    public function scopeRead($query)
    {
        return $query->where("status", "read");
    }

    public function markAsRead()
    {
        $this->update(["status" => "read"]);
    }

}
