<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <x-partial.breadcrumb :title="__('setting social link')" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form wire:submit.prevent='update'>

                                <x-inputs.group for="social_facebook" label='Facebook Profile'
                                    model="settings.social_facebook">
                                    <x-inputs.text placeholder="Enter facebook profile link" id='social_facebook'
                                        wire:model.defer="settings.social_facebook" />
                                </x-inputs.group>

                                <x-inputs.group for="social_twitter" label='twitter Profile'
                                    model="settings.social_twitter">
                                    <x-inputs.text placeholder="Enter twitter profile link" id='social_twitter'
                                        wire:model.defer="settings.social_twitter" />
                                </x-inputs.group>

                                <x-inputs.group for="social_instagram" label='instagram Profile'
                                    model="settings.social_instagram">
                                    <x-inputs.text placeholder="Enter instagram profile link" id='social_instagram'
                                        wire:model.defer="settings.social_instagram" />
                                </x-inputs.group>

                                <x-inputs.group for="social_linkedin" label='linkedin Profile'
                                    model="settings.social_linkedin">
                                    <x-inputs.text placeholder="Enter linkedin profile link" id='social_linkedin'
                                        wire:model.defer="settings.social_linkedin" />
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

@section('title', 'Setting Social Link | Skote')
