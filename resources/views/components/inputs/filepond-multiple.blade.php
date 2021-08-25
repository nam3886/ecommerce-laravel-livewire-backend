@props(['oldImagesValue', 'oldImagesName', 'model' => $attributes->wire('model')->value()])
{{ $attributes->has('multiple') }}
<div wire:ignore x-data="filepondMultiple()" x-init="init('{{ $model }}')" @close-modal.window="removeAll">
    <input type="file" x-ref="input" {{ $attributes }} multiple />
</div>

@if ($oldImagesValue)
    <div class='row'>
        <div class="col-12"><span>Old Images Preview</span></div>

        @foreach ($oldImagesValue as $key => $image)
            <div class='col-3 my-1' wire:key="imagePreview{{ $model . $key }}">
                <div class='position-relative text-center border border-secondary border-bottom-0 shadow-lg'>
                    <i class="clear-image mdi mdi-close-circle text-danger pointer position-absolute right-0 font-size-20"
                        wire:key='deleteImagePreview{{ $model . $key }}' wire:loading.class='not-allowed'
                        wire:target="image"
                        wire:click="removeImages('{{ $oldImagesName }}','{{ $key }}')"></i>
                    <span class="d-block text-truncate">{{ $image }}</span>
                </div>
                <img class="w-100 border border-secondary shadow-lg" src="{{ $image }}" alt="img-preview">
            </div>
        @endforeach

    </div>
@endif

@push('styles')
    @once
        <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
            rel="stylesheet">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js">
        </script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
        </script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script>
            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginFileValidateSize,
                FilePondPluginImagePreview
            );

            function filepondMultiple() {
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
                    }
                };
            }

        </script>
    @endonce
@endpush
{{ $attributes->has('multiple') }}
