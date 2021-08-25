@props(['model' => 'search'])

<div class="col-sm-3">
    <div class="search-box mr-2 mb-2 d-inline-block">
        <div class="position-relative">
            <input wire:model.debounce.1000ms='{{ $model }}' {{ $attributes }} type="search"
                class="form-control" placeholder="Search...">
            <i class="bx bx-search-alt search-icon"></i>
        </div>
    </div>
</div>
