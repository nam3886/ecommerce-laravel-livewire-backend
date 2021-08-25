<?php

namespace App\Models\Options;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
trait WithImages
{
    private function getLink(?string $i): ?string
    {
        if (empty($i)) return null;

        if (filter_var($i, FILTER_VALIDATE_URL)) return $i;

        return asset(Storage::url($i));
    }

    /*
    |--------------------------------------------------------------------------
    | return value like: https://... 100w
    |--------------------------------------------------------------------------
    */
    private function convertImage($key, $image): string
    {
        $image = $this->getLink($image);

        if (preg_match('/[a-z]/', $key)) $image .= " {$key}";

        return $image;
    }

    /*
    |--------------------------------------------------------------------------
    | Seo Image
    |--------------------------------------------------------------------------
    */
    public function getSeoImageLinkAttribute(): string
    {
        return $this->getLink(collect($this->seo_image['link'])->first());
    }

    /*
    |--------------------------------------------------------------------------
    | Image
    |--------------------------------------------------------------------------
    */
    public function getImageLinkAttribute(): Collection
    {
        return collect($this->image['link'] ?? null);
    }

    public function imageMappingWidth(): Collection
    {
        return $this->image_link->map(function ($image, $key) {
            return $this->convertImage($key, $image);
        });
    }

    public function imageString(): string
    {
        return implode(', ', $this->imageMappingWidth()->toArray());
    }

    /*
    |--------------------------------------------------------------------------
    | Avatar
    |--------------------------------------------------------------------------
    */
    public function getAvatarLinkAttribute(): Collection
    {
        return collect($this->avatar['link']);
    }

    public function avatarMappingWidth(): Collection
    {
        return $this->avatar_link->map(function ($image, $key) {
            return $this->convertImage($key, $image);
        });
    }

    public function avatarString(): string
    {
        return implode(', ', $this->avatarMappingWidth()->toArray());
    }

    /*
    |--------------------------------------------------------------------------
    | Images
    |--------------------------------------------------------------------------
    */
    public function getImagesLinkAttribute(): Collection
    {
        // make collection each image
        return collect($this->images)->map(fn ($image) => collect($image['link']));
    }

    public function firstOfEachImage(): Collection
    {
        return $this->images_link
            ->map(function ($image) {
                return  $image->first();
            });
    }

    public function imagesMappingWidth(): Collection
    {
        return $this->images_link->map(function ($image) {

            return $image->map(function ($item, $key) {
                return $this->convertImage($key, $item);
            });
        });
    }

    public function imagesString(): Collection
    {
        return $this->imagesMappingWidth()->map(function ($image) {
            return implode(', ', $image->toArray());
        });
    }
}
