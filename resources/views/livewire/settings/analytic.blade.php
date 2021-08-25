<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <x-partial.breadcrumb :title="__('setting analytic')" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form wire:submit.prevent='update'>
                                <x-inputs.group for="google_analytics" label='Google Analytics Code'
                                    model="settings.google_analytics">
                                    <x-inputs.textarea placeholder="Enter google analytics code" id='google_analytics'
                                        wire:model.defer="settings.google_analytics" />
                                </x-inputs.group>
                                <x-inputs.group for="facebook_pixels" label='Facebook Pixel Code'
                                    model="settings.facebook_pixels">
                                    <x-inputs.textarea placeholder="Enter facebook pixel code" id='facebook_pixels'
                                        wire:model.defer="settings.facebook_pixels" />
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

@section('title', 'Setting Analytic | Skote')
