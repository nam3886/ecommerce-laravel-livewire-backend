<?php

namespace App\Http\Livewire\Actions;

use App\Http\Livewire\Options\WithNotifyMsgUi;
use App\Http\Livewire\Options\WithStorageGoogle;
use App\Http\Livewire\Message;
use Livewire\Component;

class DeleteItemComponent extends Component
{
    use WithStorageGoogle, WithNotifyMsgUi;

    public $element;

    public function mount()
    {
        abort_if(empty($this->element), 404);
    }

    public function render()
    {
        return view('livewire.actions.delete-item-component');
    }

    public function delete()
    {
        // name for display message
        $name = $this->element->name ?? 'Item';

        // image will be deleted in observe
        $this->element->delete();
        $this->flashMessage($name . Message::DELETE_SUCCESS);
        $this->emit('table-re-render');
    }
}
