<?php

namespace App\Http\Livewire\Options;

use App\Http\Livewire\Message;
use App\Http\Livewire\Options\WithNotifyMsgUi;

/**
 * use with blade component inputs.multiple-image
 */
trait WithMultipleImagesPreview
{
    use WithNotifyMsgUi;

    protected $tempImages = [];

    public function removeImages(int $index): void
    {
        if (isset($this->images[$index])) {

            unset($this->images[$index]);
            // $this->resetValidation('images');
            // $this->resetValidation('images.*');
        } else {

            $this->flashMessage(Message::FILE_NOT_FOUND, 'error');
        }
    }

    protected function updatingImages($value)
    {
        if (count($this->images)) {
            $this->tempImages = $this->images;
        }
    }

    protected function updatedImages($value)
    {
        $this->images = array_merge($this->tempImages, $value);
        $this->validateOnly('images');
        $this->validateOnly('images.*');
    }
}
