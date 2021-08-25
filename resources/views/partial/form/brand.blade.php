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
        <x-inputs.group for="brandName" label='name' model="brand.name">
            <x-inputs.text placeholder="brand for..." id='brandName' wire:model.defer="brand.name" required />
        </x-inputs.group>

        <x-inputs.group for="brandImage" label='image' model="image">
            <x-inputs.filepond id='brandImage' wire:model.defer="image" :image="$image" required
                data-max-file-size="1MB" accept="image/png, image/jpeg, image/gif" />
        </x-inputs.group>

        <x-inputs.group for="brandDescription" label='description' model="brand.description">
            <x-inputs.textarea placeholder="How do I description web..." id='brandDescription'
                wire:model.defer="brand.description" required />
        </x-inputs.group>

        <x-inputs.group for="brandContent" label='content' model="brand.content">
            <x-inputs.textarea placeholder="How do I content web..." id='brandContent' wire:model.defer="brand.content"
                required />
        </x-inputs.group>

        <x-inputs.group for="brandActive" label='active' model="brand.active">
            <x-inputs.select id='brandActive' wire:model.defer="brand.active" required />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="nullableField" role="tabpanel">
        <x-inputs.group for="brandLink" label='link' model="brand.link">
            <x-inputs.text placeholder="https://..." id='brandLink' wire:model.defer="brand.link" />
        </x-inputs.group>
    </div>
</div>
