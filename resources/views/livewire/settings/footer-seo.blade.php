<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <x-partial.breadcrumb :title="__('setting footer & seo')" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form wire:submit.prevent='update'>
                                <x-inputs.group for="footer_copyright_text" label='Footer Copyright Text'
                                    model="settings.footer_copyright_text">
                                    <x-inputs.textarea placeholder="Enter footer copyright text"
                                        id='footer_copyright_text' wire:model.defer="settings.footer_copyright_text" />
                                </x-inputs.group>

                                <x-inputs.group for="seo_meta_title" label=' SEO Meta Title'
                                    model="settings.seo_meta_title">
                                    <x-inputs.text placeholder="Enter seo meta title for store" id='seo_meta_title'
                                        wire:model.defer="settings.seo_meta_title" />
                                </x-inputs.group>

                                <x-inputs.group for="seo_meta_description" label='SEO Meta Description'
                                    model="settings.seo_meta_description">
                                    <x-inputs.textarea placeholder="Enter seo meta description for store"
                                        id='seo_meta_description' wire:model.defer="settings.seo_meta_description" />
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

@section('title', 'Setting Footer & Seo | Skote')
