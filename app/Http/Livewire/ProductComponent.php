<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Http\Livewire\Options\WithStorageGoogle;
use App\Http\Livewire\Message;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProductComponent extends Component
{
    use WithStorageGoogle, WithFileUploads, WithNotifyMsgUi;

    const FOLDER                        =   'products';

    public          $seoImage           =   null;
    public          $avatar             =   null;
    public          $images             =   [];
    public          $oldImages          =   null;
    public bool     $isUpdate           =   false;
    public array    $product            =   [];

    public array    $brandOptions       =   [];
    public array    $unitOptions        =   [];
    public array    $categoryOptions    =   [];
    public array    $attributes         =   [];
    public array    $attributeValues    =   [];
    public array    $columns            =   [
        ['name' => 'id', 'sortable' => true],
        ['name' => 'name', 'sortable' => true],
        ['name' => 'price', 'sortable' => true],
        ['name' => 'quantity', 'sortable' => true],
        ['name' => 'avatar'],
        ['name' => 'active'],
        ['name' => 'action']
    ];

    protected int   $imageWidth         =   600;
    protected int   $maxFileImages      =   10;
    protected       $listeners          =   [
        'edit-item' => 'edit'
    ];
    protected       $rules              =   [
        'seoImage'                      =>  'required|image|max:1024',
        'avatar'                        =>  'required|image|max:1024',
        'images'                        =>  'required|array|max:10',
        'images.*'                      =>  'image|max:1024',

        'product.name'                  =>  'required|string|min:3|max:255',
        'product.price'                 =>  'required|numeric|between:0,999999999999',
        'product.content'               =>  'required|string|min:3|max:1024',
        'product.description'           =>  'required|string|min:3|max:1024',
        'product.active'                =>  'required|boolean',
        'product.seo_title'             =>  'required|string|min:3|max:255',
        'product.seo_description'       =>  'required|string|min:3|max:1024',
        'product.seo_keyword'           =>  'required|string|min:3|max:255',

        'product.unit_id'               =>  'required|integer|exists:App\Models\Unit,id',
        'product.brand_id'              =>  'required|integer|exists:App\Models\Brand,id',

        'product.categories_id'         =>  'required|array',
        'product.categories_id.*'       =>  'integer|exists:App\Models\Category,id',
        'product.sizes_id'              =>  'required|array',
        'product.sizes_id.*'            =>  'integer|exists:App\Models\Size,id',
        'product.colors_id'             =>  'required|array',
        'product.colors_id.*'           =>  'integer|exists:App\Models\Color,id',

        'product.view'                  =>  'nullable|numeric|min:0|max:999999999999',
        'product.discount'              =>  'nullable|string|min:3|max:255',
        'product.flag'                  =>  'nullable|string|min:3|max:255',
    ];

    public function mount()
    {
        $this->brandOptions = Brand::whereActive(1)
            ->select('id', 'name')
            ->get()
            ->map(fn ($item) => ['value' => $item->id, 'label' => $item->name])
            ->toArray();

        $this->unitOptions = [
            ['value' => 1, 'label' => 'percent'],
            ['value' => 2, 'label' => 'currency'],
        ];

        $this->categoryOptions = Category::whereActive(1)
            ->select('id', 'name')
            ->get()
            ->map(fn ($item) => ['value' => $item->id, 'label' => $item->name])
            ->toArray();

        // $this->attributes = Attribute::whereActive(1)
        //     ->select('id', 'name')
        //     ->get()
        //     ->map(fn ($item) => ['value' => $item->id, 'label' => $item->name])
        //     ->toArray();

        // $this->attributeValues = AttributeValue::whereActive(1)
        //     ->select('id', 'name')
        //     ->get()
        //     ->map(fn ($item) => ['value' => $item->id, 'label' => $item->name])
        //     ->toArray();
    }

    public function render()
    {
        return view('livewire.product-component');
    }

    public function edit(Product $product): void
    {
        $images = $product->image->firstOfEachImage()->toArray();

        $this->isUpdate                 =   true;
        $this->product                  =   $product->attributesToArray();
        $this->product['active']        =   intval($this->product['active']);

        $this->product['categories_id'] =   $product->categories->pluck('id')->toArray();
        $this->product['sizes_id']      =   $product->sizes->pluck('id')->toArray();
        $this->product['colors_id']     =   $product->colors->pluck('id')->toArray();

        $this->seoImage                 =   $product->seo_image_link;
        $this->avatar                   =   $product->image->avatar_link->first();
        $this->oldImages                =   $images;

        $this->dispatchBrowserEvent('edit-mode');
        $this->dispatchBrowserEvent('open-modal');
    }

    public function cancel(): void
    {
        $this->resetValidation();
        $this->reset('isUpdate', 'seoImage', 'images', 'oldImages', 'avatar', 'product');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function store()
    {
        $this->validate();

        $seoImage           =   $this->storeFile($this->imageWidth, null, self::FOLDER, $this->seoImage);
        $avatar             =   $this->storeFile($this->imageWidth, null, self::FOLDER, $this->avatar);
        $images             =   $this->storeFiles($this->imageWidth, null, self::FOLDER, $this->images);

        $product            =   new Product();

        $product->fill($this->product);

        $product->slug      =   Str::slug($this->product['name'] . uniqid('-'));
        $product->seo_image =   $seoImage;

        $product->save();
        $product->categories()->sync($this->product['categories_id']);
        $product->colors()->sync($this->product['colors_id']);
        $product->sizes()->sync($this->product['sizes_id']);
        $product->image()->create(['images' => $images, 'avatar' => $avatar]);

        $this->cancel();
        $this->flashMessage($product->name . Message::STORE_SUCCESS);
        $this->emit('table-re-render');
    }

    public function update(Product $product)
    {
        // Remove the rule if the image has not changed
        if ($this->seoImage === $product->seo_image_link) {
            unset($this->rules['seoImage']);
        }

        if ($this->avatar === $product->image->avatar_link->first()) {
            unset($this->rules['avatar']);
        }

        // if old images > 0 => remove required rule
        count($this->oldImages) && $this->rules['images'] = 'array|max:10';

        $this->validate();

        $product->fill($this->product);

        $this->handleNewFile($product, 'seo_image');
        $this->handleNewFile($product->image, 'avatar');
        $this->handleNewFiles($product->image, 'images');

        $product->save();
        $product->categories()->sync($this->product['categories_id']);
        $product->colors()->sync($this->product['colors_id']);
        $product->sizes()->sync($this->product['sizes_id']);
        $product->image->save();

        $this->cancel();
        $this->flashMessage($product->name . Message::UPDATE_SUCCESS);
        $this->emit('table-re-render');
    }
}
