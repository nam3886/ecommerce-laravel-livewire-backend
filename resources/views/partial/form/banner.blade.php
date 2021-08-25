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
        <x-inputs.group for="bannerImage" label='image' model="image">
            <x-inputs.filepond id='bannerImage' wire:model.defer="image" :image="$image" required
                data-max-file-size="2MB" accept="image/png, image/jpeg, image/gif" />
        </x-inputs.group>

        <x-inputs.group for="bannerPosition" label='position' model="banner.position">
            <x-inputs.select id='bannerPosition' wire:model.defer="banner.position" :options="$positionOptions"
                required />
        </x-inputs.group>

        <x-inputs.group for="bannerActive" label='link' model="banner.active">
            <x-inputs.select id='bannerActive' wire:model.defer="banner.active" required />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="nullableField" role="tabpanel">
        <x-inputs.group for="bannerTitle" label='title' model="banner.title">
            <x-inputs.text placeholder="Banner for..." id='bannerTitle' wire:model.defer="banner.title" />
        </x-inputs.group>

        <x-inputs.group for="bannerContent" label='content' model="banner.content">
            <x-inputs.text placeholder="Banner for..." id='bannerContent' wire:model.defer="banner.content" />
        </x-inputs.group>

        <x-inputs.group for="bannerLink" label='link' model="banner.link">
            <x-inputs.text placeholder="https://..." id='bannerLink' wire:model.defer="banner.link" />
        </x-inputs.group>
    </div>
</div>
