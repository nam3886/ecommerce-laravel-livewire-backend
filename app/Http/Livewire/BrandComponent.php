<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Http\Livewire\Options\WithStorageGoogle;
use App\Http\Livewire\Message;
use App\Models\Brand;
use App\Services\GoogleStorageService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class BrandComponent extends Component
{
    use WithNotifyMsgUi, WithStorageGoogle, WithFileUploads;

    const FOLDER                    =   'brands';

    public          $image          =   null;
    public bool     $isUpdate       =   false;
    public array    $brand          =   [];

    protected int   $imageWidth     =   480;
    protected       $listeners      =   [
        'edit-item' => 'edit'
    ];
    protected       $rules          =   [
        'brand.name'                =>  'required|string|min:3|max:255',
        'brand.description'         =>  'required|string|min:3|max:1024',
        'brand.content'             =>  'required|string|min:3|max:1024',
        'brand.active'              =>  'required|boolean',
        'image'                     =>  'required|image|max:1024',
        'brand.link'                =>  'nullable|url',
    ];

    public function render()
    {
        return view('livewire.brand-component');
    }

    public function edit(Brand $brand): void
    {
        $this->isUpdate         =   true;
        $this->brand            =   $brand->attributesToArray();
        $this->brand['active']  =   intval($this->brand['active']);
        $this->image            =   $brand->image_link->first();
        $this->dispatchBrowserEvent('open-modal');
    }

    public function cancel(): void
    {
        $this->resetValidation();
        $this->reset('isUpdate', 'image', 'brand');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function store(): void
    {
        $this->validate();

        $file   =   new GoogleStorageService;
        $brand  =   new Brand;

        $brand->fill($this->brand);

        $brand->slug    =   Str::slug($this->brand['name'] . uniqid('-'));
        $brand->image   = $file->setDir(self::FOLDER)
            ->setFile($this->image)
            ->setWidth($this->imageWidth)
            ->resize()
            ->store();

        $brand->save();

        $this->cancel();
        $this->flashMessage($brand->name . Message::STORE_SUCCESS);
        $this->emit('table-re-render');
    }

    public function update(Brand $brand): void
    {
        if ($this->image === $brand->image_link->first()) {
            unset($this->rules['image']);
        }

        $this->validate();

        $brand->fill($this->brand);

        $this->handleNewFile($brand, 'image');

        $brand->save();

        $this->cancel();
        $this->flashMessage($brand->name . Message::UPDATE_SUCCESS);
        $this->emit('table-re-render');
    }
}
