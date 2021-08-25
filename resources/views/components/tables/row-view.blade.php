@props(['model' => 'perPage'])

<div class='col-sm-2 offset-sm-7'>
    <div class="form-group row">
        <label class="offset-md-3 col-md-4 pr-md-0 col-form-label text-capitalize">show</label>
        <div class="col-md-5 pl-md-0">
            <select wire:model="{{ $model }}" class="custom-select" {{ $attributes }}>
                <option value={{ 10 }}>10</option>
                <option value={{ 25 }}>25</option>
                <option value={{ 50 }}>50</option>
                <option value={{ 100 }}>100</option>
            </select>
        </div>
    </div>
</div>
