<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =   [
        'product_id',
        'client_id',
        'user_id',
        'name',
        'email',
        'parent_id',
        'content',
        'like',
        'like_by',
        'star',
        'active'
    ];

    protected $casts = ['like_by' => 'array'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function getIsLikedAttribute(): bool
    {
        $list = $this->like_by;

        if (!auth()->check() || !is_array($list)) return 0;

        return in_array(auth()->id(), $list) ? 1 : 0;
    }

    public function getCountLikeAttribute(): int
    {
        if (is_null($this->like_by)) {
            return 0;
        }

        return count($this->like_by);
    }
}
