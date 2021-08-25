@props(['title' => Str::title(config('settings.site_name')), 'last' => null])

<div wire:ignore class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{ Str::title($title) }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach (Request::segments() as $segment)
                    @if ($loop->last)
                    @empty($last)
                    <li class="breadcrumb-item active">{{ Str::title($segment) }}</li>
                    @else
                    <li class="breadcrumb-item active">{{ Str::title($last) }}</li>
                    @endempty
                    @else
                    <li>
                    <li class="breadcrumb-item"><a href="/{{ $segment }}">{{ Str::title($segment) }}</a></li>
                    </li>
                    @endif
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</div>