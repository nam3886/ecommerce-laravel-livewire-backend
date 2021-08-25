<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $table    =   'product_discounts';

    protected $fillable =   ['variant_id', 'product_id', 'value', 'start', 'end', 'unit', 'valid'];

    protected $casts    =   [
        'start'         =>  'datetime',
        'end'           =>  'datetime',
    ];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getDiscountFormatAttribute(): string
    {
        return match ($this->unit) {
            'percent'   =>  $this->value . '%',
            'currency'  =>  '$' . number_format($this->value),
        };
    }
}
