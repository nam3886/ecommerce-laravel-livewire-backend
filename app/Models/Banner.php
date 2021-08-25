<?php

namespace App\Models;

use App\Models\Options\WithImages;
use App\Models\Options\WithSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory, WithImages, WithSearch;

    protected $fillable =   ['image', 'position', 'link', 'title', 'content', 'order', 'active'];
    protected $casts    =   ['image' => 'array'];
    protected static $searchFields = ['position', 'link', 'title'];
}
