<?php

namespace App\Models\Location;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $table    =   'location_provinces';
    protected $fillable =   ['name', 'type'];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'province_id');
    }

    public function userAddresses(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'province_id');
    }
}
