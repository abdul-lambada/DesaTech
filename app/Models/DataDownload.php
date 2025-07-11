<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'download_count',
    ];

    protected $casts = [
        'download_count' => 'integer',
    ];

    public function incrementDownloadCount()
    {
        $this->increment("download_count");
    }

    public function scopePopular($query)
    {
        return $query->orderBy("download_count", "desc");
    }

}
