@props(['title' => ''])

<div class="col-sm-12 p-0 mb-2">
    <div class="text-sm-left">
        <button wire:loading.attr='disabled' wire:loading.class='not-allowed' type="button"
            class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal"
            data-target="#adminModalAction">

            <i class="mdi mdi-plus mr-1"></i>
            {{ $title }}

        </button>
    </div>
</div>
