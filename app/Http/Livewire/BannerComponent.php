<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Http\Livewire\Options\WithStorageGoogle;
use App\Http\Livewire\Message;
use App\Models\Banner;
use App\Services\GoogleStorageService;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerComponent extends Component
{
    use WithNotifyMsgUi, WithStorageGoogle, WithFileUploads;

    const FOLDER                        =   'banners';

    public          $image              =   null;
    public bool     $isUpdate           =   false;
    public array    $banner             =   [];

    public array    $positionOptions    =   [];
    public array    $columns            =   [
        ['name' => 'id', 'sortable' => true],
        ['name' => 'image'],
        ['name' => 'position', 'sortable' => true],
        ['name' => 'created_at', 'sortable' => true],
        ['name' => 'active'],
        ['name' => 'action']
    ];

    protected int   $imageWidth         =   1920;
    protected       $listeners          =   [
        'edit-item' => 'edit'
    ];
    protected       $rules              =   [
        'banner.link'                   =>  'nullable|url',
        'banner.title'                  =>  'nullable|string|min:3|max:1024',
        'banner.content'                =>  'nullable|string|min:3|max:1024',
        'banner.position'               =>  'required|in:slider,body1,body2,body3,bottom,other',
        'banner.active'                 =>  'required|boolean',
        'image'                         =>  'required|image|max:2048'
    ];

    public function mount()
    {
        $this->positionOptions = [
            ['value' => 'slider', 'label' => 'slider'],
            ['value' => 'body1', 'label' => 'body1'],
            ['value' => 'body2', 'label' => 'body2'],
            ['value' => 'body3', 'label' => 'body3'],
            ['value' => 'bottom', 'label' => 'bottom'],
            ['value' => 'other', 'label' => 'other'],
        ];
    }

    public function render()
    {
        return view('livewire.banner-component');
    }

    public function edit(Banner $banner): void
    {
        $this->isUpdate         =   true;
        $this->banner           =   $banner->attributesToArray();
        $this->banner['active'] =   intval($this->banner['active']);
        $this->image            =   $banner->image_link->first();
        $this->dispatchBrowserEvent('open-modal');
    }

    public function cancel(): void
    {
        $this->resetValidation();
        $this->reset('isUpdate', 'image', 'banner');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function store(): void
    {
        $this->validate();

        $file           =   new GoogleStorageService;
        $banner         =   new Banner;

        $banner->fill($this->banner);

        $banner->image  =   $file->setDir(self::FOLDER)
            ->setFile($this->image)
            ->setWidth($this->imageWidth)
            ->resize()
            ->store();

        $banner->save();

        $this->handleActionSuccess($banner->name);
    }

    public function update(Banner $banner): void
    {
        if ($this->image === $banner->image_link->first()) {
            unset($this->rules['image']);
        }

        $this->validate();

        $banner->fill($this->banner);

        $this->handleNewFile($banner, 'image');

        $banner->save();

        $this->handleActionSuccess($banner->name);
    }

    private function handleActionSuccess(string $name): void
    {
        $message = $this->isUpdate ? Message::UPDATE_SUCCESS : Message::STORE_SUCCESS;
        $this->cancel();
        $this->flashMessage($name . $message);
        $this->emit('table-re-render');
    }
}
