<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <x-partial.breadcrumb :title="__('setting general')" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form wire:submit.prevent='update'>
                                <x-inputs.group for="site_name" label='site name' model="settings.site_name">
                                    <x-inputs.text placeholder="Enter site name" id='site_name'
                                        wire:model.defer="settings.site_name" />
                                </x-inputs.group>

                                <x-inputs.group for="site_title" label='site title' model="settings.site_title">
                                    <x-inputs.text placeholder="Enter site title" id='site_title'
                                        wire:model.defer="settings.site_title" />
                                </x-inputs.group>

                                <x-inputs.group for="default_email_address" label='Default Email Address'
                                    model="settings.default_email_address">
                                    <x-inputs.text placeholder="Enter store default email address"
                                        id='default_email_address' wire:model.defer="settings.default_email_address"
                                        type="email" />
                                </x-inputs.group>

                                <x-inputs.group for="default_address" label='Default Address'
                                    model="settings.default_address">
                                    <x-inputs.text placeholder="Enter store default address" id='default_address'
                                        wire:model.defer="settings.default_address" type="email" />
                                </x-inputs.group>

                                <x-inputs.group for="default_phone" label='Default Phone (separated by space|space)'
                                    model="settings.default_phone">
                                    <x-inputs.text placeholder="0909123456 | 0909123456" id='default_phone'
                                        wire:model.defer="settings.default_phone" type="email" />
                                </x-inputs.group>

                                <x-inputs.group for="currency_code" label='Currency Code'
                                    model="settings.currency_code">
                                    <x-inputs.text placeholder="Enter store currency code" id='currency_code'
                                        wire:model.defer="settings.currency_code" />
                                </x-inputs.group>

                                <x-inputs.group for="currency_symbol" label='Currency Symbol'
                                    model="settings.currency_symbol">
                                    <x-inputs.text placeholder="Enter store currency symbol" id='currency_symbol'
                                        wire:model.defer="settings.currency_symbol" />
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

@section('title', 'Setting General | Skote')
