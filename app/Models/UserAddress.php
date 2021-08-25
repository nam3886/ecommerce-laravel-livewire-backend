<?php

namespace App\Models;

use App\Models\Location\District;
use App\Models\Location\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';
    protected $fillable = ['user_id', 'province_id', 'district_id', 'street'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function province(): belongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district(): belongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
