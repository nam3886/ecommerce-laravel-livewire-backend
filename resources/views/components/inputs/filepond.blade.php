@props(['image', 'model' => $attributes->wire('model')->value(), 'hasOldImage' => $image && is_string($image)])

<div>
    <div @if ($hasOldImage) class='d-none' @endif>
        <div wire:ignore x-data="filepond('{{ $model }}')" x-init="init('{{ $model }}')"
            @close-modal.window="removeAll">
            <input type="file" x-ref="input" {{ $attributes }} />
        </div>
    </div>

    @if ($hasOldImage)
        <div class='row'>
            <div class="col-12"><span>Old Images Preview</span></div>
            <div class='col-12 my-1' wire:key="imagePreview{{ $model }}">
                <div class='position-relative text-center border border-secondary border-bottom-0 shadow-lg'>
                    <i class="clear-image mdi mdi-close-circle text-danger pointer position-absolute right-0 font-size-20"
                        wire:key='deleteImagePreview{{ $model }}' wire:loading.class='not-allowed'
                        wire:target="image" wire:click="removeImages('{{ $model }}')"></i>
                    <span class="d-block text-truncate">{{ $image }}</span>
                </div>
                <img class="w-100 border border-secondary shadow-lg" src="{{ $image }}" alt="img-preview">
            </div>
        </div>
    @endif
</div>

@push('scripts')
    @once
        <script>
            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginFileValidateSize,
                FilePondPluginImagePreview
            );

            function filepond() {
                return {
                    filepond: null,
                    init: function(model) {
                        this.filepond = FilePond.create(this.$refs.input);

                        this.filepond.setOptions({
                            server: {
                                process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                                    options) => {
                                    @this.upload(model, file, load, error, progress);
                                },
                                revert: (filename, load) => {
                                    @this.removeUpload(model, filename, load);
                                },
                            }
                        });
                    },
                    removeAll: function() {
                        this.filepond.removeFiles();
                    },
                };
            }

        </script>
    @endonce
@endpush
