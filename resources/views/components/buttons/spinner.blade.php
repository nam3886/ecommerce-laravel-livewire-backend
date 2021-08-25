@props([
    'title' => '',
    'target' => '',
    'style' => '',
    'type' => 'button',
    'color' => 'primary',
    'loading' => 1,
])

<div class="col-md-6 {{ $style }}">
    <button @if ($attributes['disabled']) disabled @endif
        type="{{ $type }}" {{ $attributes->merge(['class' => "btn btn-$color w-md"]) }}
        wire:loading.class="not-allowed" wire:loading.attr='disabled'>
        <div class="d-flex align-items-center justify-content-center">

            @if ($loading)
                <div {{ $target ? "wire:target=$target" : '' }} wire:loading
                    class="spinner-border spinner-border-sm mr-3">
                </div>
            @endif

            <strong class='text-capitalize'>{{ $title }}</strong>
        </div>
    </button>
</div>
