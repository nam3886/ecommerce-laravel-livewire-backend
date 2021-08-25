<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'cost', 'description', 'active'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'payment_code');
    }
}
