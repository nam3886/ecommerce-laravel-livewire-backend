<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';

    protected $fillable = [
        'value',
        'stock',
        'unit',
        'products_id',  //if = all => apply for all products
        'code',
        'description',
        'start',
        'end',
        'valid',
        'active'
    ];

    protected $casts = [
        'products_id' => 'array',
    ];

    public function getStartAttribute($value): Carbon
    {
        return Carbon::create($value);
    }

    public function getEndAttribute($value): Carbon
    {
        return Carbon::create($value);
    }
}
