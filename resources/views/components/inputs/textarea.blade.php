@props(['model' => $attributes->wire('model')->value()])

<textarea {{ $attributes->merge(['class' => 'form-control input-lg ' . (!$errors->has($model) ?: 'is-invalid')]) }}
    rows="5"></textarea>
