<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <x-partial.breadcrumb :title="__('setting logo')" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form wire:submit.prevent='update'>

                                <x-inputs.group for="logo" label='Site Logo (dark color hint)' model="logo">
                                    <x-inputs.filepond id='logo' data-max-file-size="1MB" accept="image/*"
                                        wire:model.defer="logo" :image="$logo" />
                                </x-inputs.group>

                                <x-inputs.group for="favicon" label='Site Favicon (type: ico)' model="favicon">
                                    <x-inputs.filepond id='favicon' data-max-file-size="1MB" accept="image/*"
                                        wire:model.defer="favicon" :image="$favicon" />
                                </x-inputs.group>

                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                                Update Settings
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('title', 'Setting Logo | Skote')
