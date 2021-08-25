<?php

namespace App\Models;

use App\Models\Options\WithImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class ProductImage extends Model
{
    use HasFactory, WithImages;

    protected $table = 'product_images';

    protected $fillable = ['product_id', 'images', 'avatar'];

    protected $casts = [
        'avatar' => 'array',
        'images' => 'array',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
