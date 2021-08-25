@props(['label', 'for', 'model'])

<div class="form-group row" {{ $attributes }}>

    <label for="{{ $for }}" class="col-md-2 col-form-label text-capitalize">{{ $label }}</label>

    <div class="col-md-10">{{ $slot }}</div>

    @error($model)
        <div class="error-validate col-md-10 offset-md-2 mt-2">
            <span class="toast-error text-white rounded px-1">
                {{ $message }}
            </span>
        </div>
    @enderror

    @error($model . '.*')
        <div class="error-validate col-md-10 offset-md-2 mt-2">
            <span class="toast-error text-white rounded px-1">
                {{ $message }}
            </span>
        </div>
    @enderror

</div>
