<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <x-partial.breadcrumb :title="__('setting payment')" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form wire:submit.prevent='update'>
                                <x-inputs.group for="stripe_payment_method" label='Stripe Payment Method'
                                    model="settings.stripe_payment_method">
                                    <x-inputs.select id='stripe_payment_method'
                                        wire:model.defer="settings.stripe_payment_method" :options="$activeOptions" />
                                </x-inputs.group>

                                <x-inputs.group for="stripe_key" label='stripe key' model="settings.stripe_key">
                                    <x-inputs.text placeholder="Enter stripe key" id='stripe_key'
                                        wire:model.defer="settings.stripe_key" />
                                </x-inputs.group>

                                <x-inputs.group for="stripe_secret_key" label='stripe secret key'
                                    model="settings.stripe_secret_key">
                                    <x-inputs.text placeholder="Enter stripe secret key" id='stripe_secret_key'
                                        wire:model.defer="settings.stripe_secret_key" />
                                </x-inputs.group>

                                <x-inputs.group for="paypal_payment_method" label='PayPal Payment Method'
                                    model="settings.paypal_payment_method">
                                    <x-inputs.select id='paypal_payment_method'
                                        wire:model.defer="settings.paypal_payment_method" :options="$activeOptions" />
                                </x-inputs.group>

                                <x-inputs.group for="paypal_client_id" label='paypal client id'
                                    model="settings.paypal_client_id">
                                    <x-inputs.text placeholder="Enter paypal client id" id='paypal_client_id'
                                        wire:model.defer="settings.paypal_client_id" />
                                </x-inputs.group>

                                <x-inputs.group for="paypal_secret_id" label='paypal secret id'
                                    model="settings.paypal_secret_id">
                                    <x-inputs.text placeholder="Enter paypal secret id" id='paypal_secret_id'
                                        wire:model.defer="settings.paypal_secret_id" />
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

@section('title', 'Setting Payment | Skote')
