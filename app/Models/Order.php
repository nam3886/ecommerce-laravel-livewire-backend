<?php

namespace App\Models;

use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Options\WithSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes, WithSearch;

    protected static $searchFields = ['total_price', 'shipping_phone', 'shipping_fullname'];

    protected $fillable = [
        'user_id',
        'voucher_id',
        'order_number',
        'status',
        'total_price',
        'discount',
        'sub_total',
        'tax',
        'grand_total',
        'item_count',
        'is_paid',
        'payment_code',
        'online_pay_code',
        'shipping_fullname',
        'shipping_province_id',
        'shipping_district_id',
        'shipping_street',
        'shipping_phone',
        'shipping_cost',
        'notes',
        'order_success',
        'active',
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_code');
    }

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'shipping_province_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'shipping_district_id');
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_details')
            ->using(OrderDetail::class)
            ->withPivot('price', 'quantity', 'sku');
    }

    public function setOrderNumberAttribute($value)
    {
        $this->attributes['order_number'] = strtoupper($value);
    }
}
