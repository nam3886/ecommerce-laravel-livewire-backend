@props([
'options' => [
['value' => 1, 'label' => 'Yes'],
['value' => 0, 'label' => 'No'],
],
'model' => $attributes->wire('model')->value()
])

<select {{ $attributes->merge([
    'class' => 'custom-select text-capitalize ' . (!$errors->has($model) ?: 'is-invalid'),
]) }}>

    <option selected>Open this select menu</option>

    @foreach ($options as $option)
    <option class="text-capitalize" value="{{ $option['value'] }}">
        {{ $option['label'] }}
    </option>
    @endforeach

</select>