<?php

namespace App\Models;

use App\Models\Options\WithImages;
use App\Models\Options\WithSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, WithImages, WithSearch;

    protected static $searchFields = ['name'];

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'image',
        'seo_image',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'order',
        'is_featured',
        'is_menu',
        'active',
    ];

    protected $casts    =   [
        'image'         =>  'array',
        'seo_image'     =>  'array',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
