<?php

namespace App\Http\Livewire\Options;

use App\Services\GoogleStorageService;
use Illuminate\Database\Eloquent\Model;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Str;

/**
 * const FOLDER must be defined
 */
trait WithStorageGoogle
{
    /**
     * remove old images preview
     */
    public function removeImages(string $model, ?int $index = null)
    {
        // single image
        if (isset($this->$model) && is_string($this->$model)) {

            $this->syncInput($model, null);
        } elseif (isset($this->$model[$index])) {

            unset($this->$model[$index]);
        }
    }

    /**
     * empty new file => delete old file => assign attribute = null
     * new file instanceof TemporaryUploadedFile
     * => delete old file, save new file
     * => assign attribute =  new file path
     */
    protected function handleNewFile(Model &$model, string $attributeName): void
    {
        $newImage = Str::camel($attributeName);
        $file = new GoogleStorageService;

        if (empty($this->$newImage)) {

            $file->delete($model->$attributeName);
            $model->$attributeName = null;
        } elseif ($this->$newImage instanceof TemporaryUploadedFile) {

            $file->delete($model->$attributeName);

            $model->$attributeName = $file->setDir(self::FOLDER)
                ->setFile($this->$newImage)
                ->setWidth($this->imageWidth)
                ->resize()
                ->store();
        }
    }

    /**
     * check files changed by index
     * delete old file, save new files
     * assign new files path to attribute of model
     */
    protected function handleNewFiles(Model &$model, string $attributeName): void
    {
        $newFiles   =   Str::camel($attributeName);
        $oldFiles   =   Str::camel("old-{$attributeName}");

        if (!isset($this->$newFiles, $this->$oldFiles)) return;

        $filesIndex =   array_keys($this->$oldFiles); // index of files user wanna keep
        $files      =   collect($model->$attributeName);
        $deleting   =   $files->reject(fn ($image, $index) => in_array($index, $filesIndex));
        $keeping    =   $files->reject(fn ($image, $index) => !in_array($index, $filesIndex))->toArray();
        $file       =   new GoogleStorageService;

        $file->delete(...$deleting);

        $newFiles   =   $file->setDir(self::FOLDER)
            ->setWidth($this->imageWidth)
            ->resizeAndStoreMultiple($this->$newFiles);

        array_push($keeping, ...$newFiles);

        $model->$attributeName = $keeping;
    }
}
