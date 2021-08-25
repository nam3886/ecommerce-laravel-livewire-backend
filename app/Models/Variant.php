<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id',  'sku', 'combination', 'name', 'price', 'quantity'];

    public function discount(): HasOne
    {
        return $this->hasOne(ProductDiscount::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'attribute_value_variant');
    }

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
