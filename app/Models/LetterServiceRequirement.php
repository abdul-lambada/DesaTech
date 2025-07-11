<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LetterServiceRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_service_id',
        'requirement',
        'is_required',
    ];

    protected $casts = [
        'is_required' => 'boolean',
    ];

    public function letterService(): BelongsTo
    {
        return $this->belongsTo(LetterService::class);
    }

}
