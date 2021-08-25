@props([
'isValid',
'attrs',
'id' => $attrs->id,
'model' => $attrs->model,
'value' => $attrs->value ?? '#000',
])

<div wire:ignore wire:loading.class='not-allowed' id="{{ $id }}" class="input-group"
    title="Using format option"
    x-data="{changeColor:(e)=>$wire?.set('{{ $model }}',e.color?.toHexString()),setColor:(c)=>$('#{{ $id }}').colorpicker('setValue',c),resetColor:()=>$('#{{ $id }}').colorpicker('setValue','{{ $value }}')}"
    @set-{{ $model }}.window="setColor($event.detail.color)" @reset-{{ $model }}.window="resetColor()"
    x-init="$('#{{ $id }}').colorpicker({format:'hex',color:'{{ $value }}',extensions:[{name:'swatches',options:{colors:{'black':'#000000','gray':'#888888','white':'#ffffff','red':'red','default':'#777777','primary':'#337ab7','success':'#5cb85c','info':'#5bc0de','warning':'#f0ad4e','danger':'#d9534f'},namesAsValues:!0}}]}).off('colorpickerChange').on('colorpickerChange', $.fn.debounce(changeColor,1000))">

    <input class="form-control input-lg @isset($isValid[$model]) is-valid @endisset @error($model) is-invalid @enderror"
        type="text" {{ $attributes }} />

    <span class=" input-group-append">
        <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
</div>
