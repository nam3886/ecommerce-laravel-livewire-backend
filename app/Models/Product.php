<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use App\Models\Options\WithImages;
use App\Models\Options\WithSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory, WithImages, WithSearch, EagerLoadPivotTrait;

    protected static $searchFields = ['name'];

    protected $fillable =   [
        'brand_id',
        'view',
        'name',
        'slug',
        'flag',
        'content',
        'description',
        'price',
        'quantity',
        'seo_image',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'is_featured',
        'order',
        'active'
    ];

    protected $casts    =   [
        'seo_image'     =>  'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_details')
            ->using(OrderDetail::class)
            ->withPivot('price', 'quantity', 'sku');
    }

    public function gallery(): HasOne
    {
        return $this->hasOne(ProductImage::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(ProductDiscount::class);
    }

    // at least 1 variant
    public function variants(): hasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Scope
    |--------------------------------------------------------------------------
    */
    public function scopeActive($query)
    {
        return $query->whereActive(1);
    }

    /*
    |--------------------------------------------------------------------------
    | More Attribute
    |--------------------------------------------------------------------------
    */

    public function getPriceAfterDiscountAttribute(): float
    {
        $discount = $this->discount;

        if (empty($discount)) return $this->price;

        return ceil(match ($discount->unit) {
            'percent'   =>  $this->price * (100 - $discount->value) / 100,
            'currency'  =>  $this->price - $discount->value,
        });
    }
}
