@props([
'isValid',
'attrs',
'text' => $attrs->text ?? 'name',
'value' => $attrs->value,
'model' => $attrs->model,
'event' => strtolower(preg_replace('/[-._\s]/i', '', $attrs->model)),
])

<div x-data="{
    options :   {{ json_encode($attrs->options) }},
    set     :   function(value,element){ 
                    $(element).val(value); this?.init(element)
                },
    reset   :   function(element){ 
                    $(element).val(null); this?.init(element); 
                },
    init    :   function(element){ 
                    $(element)
                    .unbind()
                    .select2({dropdownAutoWidth:!0,width:'100%'})
                    .on('change',$.fn.debounce(this.change,1000)); 
                },
    change  :   (e) => $wire?.set('{{ $model }}', e.target.value) }" x-init="init($refs.select2)"
    @set-select2.window="set($event.detail.{{ $event }}, $refs.select2)"
    @reset-all-select2.window="reset($refs.select2)">

    <div wire:ignore x-ref='parentSelect2'>

        <select x-ref="select2" {{ $attributes }} id="{{ $attrs->id }}" data-placeholder="Choose A Option"
            class="select2 custom-select @isset($isValid[$model]) is-valid @endisset @error($model) is-invalid @enderror">

            <option></option>

            <template x-for="option in options" :key="option">
                <option :value="option.{{ $value }}" x-text="option.{{ $text }}">
                </option>
            </template>

        </select>

    </div>

</div>
