<?php

namespace App\Models;

use App\Models\Options\WithImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, WithImages;

    protected $fillable = ['name', 'description', 'image', 'position', 'active'];

    protected $casts = ['image' => 'array'];
}
