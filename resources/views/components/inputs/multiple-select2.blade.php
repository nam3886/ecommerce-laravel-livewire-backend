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
    set     :   function(value,element) { 
                    $(element).val(value); 
                    this?.init(element) 
                },
    reset   :   function(element) { 
                    $(element).val(null); 
                    this?.init(element) 
                },
    change  :   (e) => $wire?.set('{{ $model }}',$(e.target).val()),
    init    :   function(element){ 
                    $(element)
                        .unbind()
                        .select2({dropdownAutoWidth:!0,width:'100%',allowClear:!0})
                        .on('change',$.fn.debounce(this.change,1000)); 
                } }" x-init="init($refs.select2)"
    @set-select2.window="set($event.detail.{{ $event }}, $refs.select2)"
    @reset-all-select2.window="reset($refs.select2)">

    <div wire:ignore>
        <select x-ref="select2" multiple="multiple" id="{{ $attrs->id }}" data-placeholder="Choose multiple options"
            class="form-control select2 select2-multiple @isset($isValid[$model]) is-valid @endisset @error($model) is-invalid @enderror"
            {{ $attributes }}>

            <template x-for="option in options" :key="option">
                <option :value="option.{{ $value }}" x-text="option.{{ $text }}">
                </option>
            </template>

        </select>
    </div>

</div>
