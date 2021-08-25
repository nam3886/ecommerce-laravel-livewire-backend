@props(['src', 'placeholder' => asset('svg/image-placeholder-400x400.svg'), 'notFound' => asset('svg/no-image-placeholder.svg')])

<div class='placeholder-image loading'>
    <img {{ $attributes->merge(['class' => 'lazyload']) }} data-sizes="auto" src="{{ $placeholder }}" @empty($src)
        data-srcset="{{ $notFound }}" data-src="{{ $notFound }}" @else data-srcset="{{ $src }}"
        data-src="{{ $src }}" @endempty />
</div>
