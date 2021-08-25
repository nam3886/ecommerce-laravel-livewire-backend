<?php

namespace App\Http\Livewire\Actions;

use Livewire\Component;

class ToggleActiveComponent extends Component
{
    public $element;

    public function mount()
    {
        abort_if(empty($this->element), 404);
    }

    public function render()
    {
        return view('livewire.actions.toggle-active-component');
    }

    public function toggle()
    {
        $this->element->active = !$this->element->active;
        $this->element->save();
    }
}
