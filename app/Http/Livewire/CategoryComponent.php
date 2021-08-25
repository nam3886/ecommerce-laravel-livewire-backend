<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Http\Livewire\Options\WithStorageGoogle;
use App\Http\Livewire\Message;
use App\Models\Category;
use App\Services\GoogleStorageService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CategoryComponent extends Component
{
    use WithNotifyMsgUi, WithStorageGoogle, WithFileUploads;

    const FOLDER                        =   'categories';

    public          $image              =   null;
    public          $seoImage           =   null;
    public bool     $isUpdate           =   false;
    public array    $category           =   [];

    public array    $positionOptions    =   [];
    public array    $categoryOptions    =   [];

    protected int   $imageWidth     =   480;
    protected       $listeners      =   ['edit-item' => 'edit'];
    protected       $rules          =   [
        'category.name'             =>  'required|string|min:3|max:255',
        'category.seo_title'        =>  'required|string|min:3|max:1024',
        'category.seo_description'  =>  'required|string|min:3|max:1024',
        'category.seo_keyword'      =>  'required|string|min:3|max:1024',
        'category.active'           =>  'required|boolean',

        'category.order'            =>  'nullable',
        'category.is_menu'          =>  'nullable|boolean',
        'category.parent_id'        =>  'nullable|exists:App\Models\Category,id',

        'image'                     =>  'nullable|image|max:1024',
        'seoImage'                  =>  'required|image|max:1024',
    ];

    public function mount()
    {
        $this->categoryOptions = Category::whereActive(1)
            ->select('id', 'name')
            ->get()
            ->map(fn ($item) => ['value' => $item->id, 'label' => $item->name])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.category-component');
    }

    public function edit(Category $category): void
    {
        $this->isUpdate             =   true;
        $this->category             =   $category->attributesToArray();
        $this->category['active']   =   intval($this->category['active']);
        $this->seoImage             =   $category->seo_image_link;
        $this->image                =   $category->image_link?->first();
        $this->dispatchBrowserEvent('open-modal');
    }

    public function cancel(): void
    {
        $this->resetValidation();
        $this->reset('isUpdate', 'seoImage', 'image', 'category');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function store(): void
    {
        $this->validate();

        $file       =   new GoogleStorageService;
        $category   =   new Category;

        $category->fill($this->category);
        $category->slug = Str::slug($this->category['name'] . uniqid('-'));

        $category->seo_image = $file->setDir(self::FOLDER)
            ->setFile($this->seoImage)
            ->setWidth($this->imageWidth)
            ->resize()
            ->store();

        if (!empty($this->image)) {
            $category->image = $file->setDir(self::FOLDER)
                ->setFile($this->image)
                ->setWidth($this->imageWidth)
                ->resize()
                ->store();
        }

        $category->save();

        $this->cancel();
        $this->flashMessage($category->name . Message::STORE_SUCCESS);
        $this->emit('table-re-render');
    }

    public function update(Category $category): void
    {
        if ($this->seoImage === $category->seo_image_link) {
            unset($this->rules['seoImage']);
        }

        if ($this->image === $category->image_link?->first()) {
            unset($this->rules['image']);
        }

        $this->validate();

        $category->fill($this->category);

        $this->handleNewFile($category, 'seo_image');
        $this->handleNewFile($category, 'image');

        $category->save();

        $this->cancel();
        $this->flashMessage($category->name . Message::UPDATE_SUCCESS);
        $this->emit('table-re-render');
    }
}
