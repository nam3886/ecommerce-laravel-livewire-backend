<div class="custom-control custom-switch" dir="ltr">
    <input type="checkbox" class="custom-control-input" id="customSwitch{{ $element->id }}"
        {{ $element->active ? 'checked' : '' }} wire:change='toggle'>
    <label class="custom-control-label hr225" for="customSwitch{{ $element->id }}"></label>
</div>
