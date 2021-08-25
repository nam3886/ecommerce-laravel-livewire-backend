@props(['pagination'])

<div class='row'>
    <div class="col-12 d-flex justify-content-end">
        @if (method_exists($pagination, 'links'))
            {{ $pagination->links() }}
        @endif
    </div>
</div>
