<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;
use Intervention\Image\Facades\Image;

class GoogleStorageService
{
    private $cloud;
    public $file;
    private string $dir = '';
    public string $filename = '';
    private string $extension = '';
    private ?int $width = null;
    private ?int $height = null;

    public function __construct()
    {
        $this->cloud = Storage::cloud();
    }

    public function setFile(TemporaryUploadedFile $file): GoogleStorageService
    {
        $this->filename = '';
        $this->file = $file;
        $this->dynamicFileName();
        return $this;
    }

    public function setWidth(int $width): GoogleStorageService
    {
        $this->width = $width;
        return $this;
    }

    public function setHeight(int $height): GoogleStorageService
    {
        $this->height = $height;
        return $this;
    }

    public function setDir($dir): GoogleStorageService
    {
        // Get subdirectories also?
        $recursive = false;
        $root = "/";

        $contents = collect($this->cloud->listContents($root, $recursive));
        $content = $contents->where('type', '=', 'dir')->where('filename', '=', $dir)->first();

        if (empty($content)) {
            Storage::cloud()->makeDirectory($dir);
            $this->setDir($dir);
        } else {
            $this->dir = $content['path'];
        }

        return $this;
    }

    /**
     * @return array include link & path
     */
    public function store(): array
    {
        $path = "{$this->dir}/{$this->filename}.{$this->extension}";

        if ($this->file instanceof TemporaryUploadedFile) {

            $this->file->storeAs($this->dir, "{$this->filename}.{$this->extension}", 'google');
        } else {

            $this->cloud->put($path, $this->file);
        }

        return [
            'link'  =>  ["{$this->width}w" => $this->cloud->url($path)],
            'path'  =>  ["{$this->width}w" => $this->cloud->getMetadata($path)['path']],
        ];
    }

    /**
     * @param mixed ...$files each file instance of TemporaryUploadedFile
     * @return array include links & paths
     */
    public function storeMultiple(...$files): array
    {
        return array_map(function ($file) {
            if ($file instanceof TemporaryUploadedFile) {
                $this->file = $file;
                return $this->store();
            }
        }, $files);
    }

    public function resizeAndStoreMultiple(...$files): array
    {
        return array_map(function ($file) {
            if ($file instanceof TemporaryUploadedFile) {
                $this->file = $file;
                return $this->resize()->store();
            }
        }, $files);
    }

    /**
     * @return GoogleStorageService
     * @param mixed ...$files each file include path & link
     */
    public function delete(...$files): GoogleStorageService
    {
        foreach ($files as $file) {

            if (empty($file)) {
                continue;
            }

            foreach ($file['path'] as $path) {
                $this->cloud->exists($path) && $this->cloud->delete($path);
            }
        }

        return $this;
    }

    /**
     * @return GoogleStorageService
     */
    public function resize(string $encode = 'webp'): GoogleStorageService
    {
        $this->file = Image::make($this->file)
            ->resize($this->width, $this->height)
            ->encode($encode);

        $this->extension = $encode;

        return $this;
    }

    private function dynamicFileName(): void
    {
        if (empty($this->filename)) {
            $pathInfo = pathinfo($this->file->getClientOriginalName());
            $this->filename = $pathInfo['filename'] . uniqid('-');
            $this->extension = $pathInfo['extension'];
        }
    }
}
