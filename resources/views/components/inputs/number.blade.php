@props(['model' => $attributes->wire('model')->value()])

<input type="number"
    {{ $attributes->merge(['class' => 'form-control input-lg ' . (!$errors->has($model) ?: 'is-invalid')]) }}>
