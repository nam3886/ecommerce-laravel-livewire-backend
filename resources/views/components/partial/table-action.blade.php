@props(['element'])

<div class="dropdown">
    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
        <i class="mdi mdi-dots-horizontal font-size-18"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <livewire:actions.show-modal-edit-item-component :key="'edit'.$element->id" :element="$element" />
        </li>
        <li>
            <livewire:actions.delete-item-component :key="'delete'.$element->id" :element="$element" />
        </li>
    </ul>
</div>
