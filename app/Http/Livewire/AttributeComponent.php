<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Message;
use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Models\Attribute;
use Livewire\Component;
use Illuminate\Support\Str;

class AttributeComponent extends Component
{
    use WithNotifyMsgUi;

    public bool $isUpdate               =   false;
    public array $attribute             =   [];
    public array $frontendTypeOptions   =   [
        ['value' => 'select', 'label' => 'select'],
        ['value' => 'radio', 'label' => 'radio'],
        ['value' => 'text', 'label' => 'text'],
        ['value' => 'textarea', 'label' => 'textarea'],
    ];

    protected $listeners    =   [
        'edit-item' => 'edit'
    ];
    protected $rules        =   [
        'attribute.name' => 'required|min:3|max:255',
        'attribute.frontend_type' => 'required|in:select,radio,text,textarea',
        'attribute.active' => 'required|boolean',
        'attribute.is_filterable' => 'nullable|boolean',
        'attribute.is_required' => 'nullable|boolean',
    ];

    public function render()
    {
        return view('livewire.attribute-component');
    }

    public function edit(Attribute $attribute): void
    {
        $this->isUpdate                     =   true;
        $this->attribute                    =   $attribute->attributesToArray();
        $this->attribute['active']          =   intval($this->attribute['active']);
        $this->attribute['is_filterable']   =   intval($this->attribute['is_filterable']);
        $this->attribute['is_required']     =   intval($this->attribute['is_required']);
        $this->dispatchBrowserEvent('open-modal');
    }

    public function cancel(): void
    {
        $this->resetValidation();
        $this->reset('isUpdate', 'attribute');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function store(): void
    {
        $this->validate();

        $attribute = new Attribute;
        $attribute->fill($this->attribute);
        $attribute->code = uniqid(Str::camel($this->attribute['name']));
        $attribute->save();

        $this->handleActionSuccess($attribute->name);
    }

    public function update(Attribute $attribute): void
    {
        $this->validate();

        $attribute->fill($this->attribute);
        $attribute->save();

        $this->handleActionSuccess($attribute->name);
    }

    private function handleActionSuccess(string $name): void
    {
        $message = $this->isUpdate ? Message::UPDATE_SUCCESS : Message::STORE_SUCCESS;
        $this->cancel();
        $this->flashMessage($name . $message);
        $this->emit('table-re-render');
    }
}
