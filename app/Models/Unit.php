<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $fillable = ['name', 'sign', 'active'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'unit_id');
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(ProductDiscount::class, 'unit_id');
    }
}
