<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'slug',
        'thumbnail',
        'title',
        'description',
        'content',
        'frontend_type',
        'active'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }

    public function getThumbnailAttribute($value)
    {
        return match ($this->frontend_type) {
            'image'     => $value,
            'slider'    => json_decode($value),
            'video'     => json_decode($value),
            'audio'     => $value,
        };
    }
}
