@props(['fields' => [], 'isUpdate', 'action' => $isUpdate ? "update({$fields['id']})" : 'store()', 'hasErrors' => $errors->count() > 0])

<div id='adminModalAction' class="modal fade" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" x-data="modal()" x-init="init" x-on:open-modal.window="show"
                x-on:close-modal.window="hide">

                <h5 class="col-12 modal-title">
                    {{ $title ?? '' }}
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form enctype="multipart/form-data" wire:submit.prevent="{{ $action }}">

                    @csrf

                    {{ $slot }}

                    <div class="form-group row mb-0 border-top pt-3">

                        <x-buttons.spinner type="submit" class="{{ !$hasErrors ?: 'not-allowed' }}"
                            id="buttonSubmitForm" title="{{ $isUpdate ? 'update' : 'create' }}"
                            target="{{ $isUpdate ? 'update' : 'store' }}" :disabled="$hasErrors"
                            wire:key="{{ 'submit-' . ($isUpdate ? 'update' : 'store') }}"
                            x-data="alertStoreOrUpdateItem()"
                            x-on:click.prevent="alertSubmit( '{{ $isUpdate }}', () => $wire?.{{ $action }} )" />

                        <x-buttons.spinner id="buttonCancelForm" title="cancel" data-dismiss="modal" color="danger"
                            style="text-md-right" :loading="0" wire:key="cancel-form" />

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

@push('scripts')
    @once
        <script>
            function alertStoreOrUpdateItem() {
                return {
                    alertSubmit: (isUpdate, action) => Swal.fire({
                        title: `Are you sure to ${isUpdate ? 'update' :'create'}?`,
                        text: 'It will be saved in your database!',
                        type: 'warning',
                        showCancelButton: !0,
                        confirmButtonColor: '#34c38f',
                        cancelButtonColor: '#f46a6a',
                        confirmButtonText: `Yes, ${isUpdate ? 'update' :'create'} it!`,
                        cancelButtonText: 'No, cancel!',
                    }).then((result) => result.value && typeof action === 'function' && action())
                }
            }

            function modal() {
                return {
                    selector: '#adminModalAction',
                    init: function() {
                        $(document)
                            .off('hidden.bs.modal', this.selector)
                            .on('hidden.bs.modal', this.selector, () => @this.cancel());
                    },
                    show: function() {
                        $(this.selector).modal('show');

                    },
                    hide: function() {
                        $(this.selector).modal('hide');
                    }
                };
            }

        </script>
    @endonce
@endpush
