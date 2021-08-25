<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-custom nav-justified mx-md-5" role="tablist">
    <li class="nav-item">
        <a wire:ignore.self class="nav-link active" data-toggle="tab" href="#requireFiled" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-exclamation-circle"></i></span>
            <span class="d-none d-sm-block">Required field</span>
        </a>
    </li>
    <li class="nav-item">
        <a wire:ignore.self class="nav-link" data-toggle="tab" href="#nullableField" role="tab">
            <span class="d-block d-sm-none"><i class="mdi mdi-null"></i></span>
            <span class="d-none d-sm-block">Nullable field</span>
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content p-3 text-muted">
    <div wire:ignore.self class="tab-pane active" id="requireFiled" role="tabpanel">
        <x-inputs.group for="attributeName" label='name' model="attribute.name">
            <x-inputs.text placeholder="eg: size" id='attributeName' wire:model.defer="attribute.name" required />
        </x-inputs.group>

        <x-inputs.group for="attributeFrontendType" label='frontend type' model="attribute.frontend_type">
            <x-inputs.select id='attributeFrontendType' wire:model.defer="attribute.frontend_type"
                :options="$frontendTypeOptions" required />
        </x-inputs.group>

        <x-inputs.group for="attributeActive" label='active' model="attribute.active">
            <x-inputs.select id='attributeActive' wire:model.defer="attribute.active" required />
        </x-inputs.group>
    </div>

    <div wire:ignore.self class="tab-pane" id="nullableField" role="tabpanel">
        <x-inputs.group for="attributeIsFilterable" label='filterable' model="attribute.is_filterable">
            <x-inputs.select id='attributeIsFilterable' wire:model.defer="attribute.is_filterable" />
        </x-inputs.group>

        <x-inputs.group for="attributeIsRequired" label='required' model="attribute.is_required">
            <x-inputs.select id='attributeIsRequired' wire:model.defer="attribute.is_required" />
        </x-inputs.group>
    </div>
</div>
