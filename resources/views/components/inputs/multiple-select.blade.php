@props(['options', 'model' => $attributes->wire('model')->value()])

<select {{ $attributes->merge([
    'class' => 'custom-select ' . (!$errors->has($model) ?: 'is-invalid'),
]) }}
    multiple>

    <option selected>Open this select menu</option>

    @foreach ($options as $option)
        <option class="text-capitalize" value="{{ $option['value'] }}" name="{{ $model }}[]">
            {{ $option['label'] }}
        </option>
    @endforeach

</select>
