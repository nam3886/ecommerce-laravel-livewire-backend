<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-custom nav-justified mx-md-5" role="tablist">
    <li class="nav-item">
        <a wire:ignore.self class="nav-link active" data-toggle="tab" href="#requireFiled" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-exclamation-circle"></i></span>
            <span class="d-none d-sm-block">Required field</span>
        </a>
    </li>
    <li class="nav-item">
        <a wire:ignore.self class="nav-link" data-toggle="tab" href="#metaDataField" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-tags"></i></span>
            <span class="d-none d-sm-block">Meta Data</span>
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
        <x-inputs.group for="categoryName" label='name' model="category.name">
            <x-inputs.text placeholder="category for..." id='categoryName' wire:model.defer="category.name" required />
        </x-inputs.group>

        <x-inputs.group for="categoryActive" label='active' model="category.active">
            <x-inputs.select id='categoryActive' wire:model.defer="category.active" required />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="metaDataField" role="tabpanel">
        <x-inputs.group for="categorySeo_title" label='seo title' model="category.seo_title">
            <x-inputs.text placeholder="category for..." id='categorySeo_title' wire:model.defer="category.seo_title"
                required />
        </x-inputs.group>

        <x-inputs.group for="categorySeo_keyword" label='seo keywords' model="category.seo_keyword">
            <x-inputs.text placeholder="category for..." id='categorySeo_keyword'
                wire:model.defer="category.seo_keyword" required />
        </x-inputs.group>

        <x-inputs.group for="categorySeo_description" label='seo description' model="category.seo_description">
            <x-inputs.textarea placeholder="How do I description web..." id='categorySeo_description'
                wire:model.defer="category.seo_description" required />
        </x-inputs.group>

        <x-inputs.group for="categorySeo_image" label='seo image' model="seoImage">
            <x-inputs.filepond id='categorySeo_image' wire:model.defer="seoImage" :image="$seoImage" required
                data-max-file-size="1MB" accept="image/png, image/jpeg, image/gif" />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="nullableField" role="tabpanel">
        <x-inputs.group for="categoryImage" label='image' model="image">
            <x-inputs.filepond id='categoryImage' wire:model.defer="image" :image="$image" data-max-file-size="1MB"
                accept="image/png, image/jpeg, image/gif" />
        </x-inputs.group>

        <x-inputs.group for="categoryIsMenu" label='is menu' model="category.is_menu">
            <x-inputs.select id='categoryIsMenu' wire:model.defer="category.is_menu" />
        </x-inputs.group>

        <x-inputs.group for="categoryOrderBefore" label='order before' model="category.order">
            <x-inputs.select id='categoryOrderBefore' wire:model.defer="category.order" :options="$categoryOptions" />
        </x-inputs.group>

        <x-inputs.group for="categoryParentId" label='parent' model="category.parent_id">
            <x-inputs.select id='categoryParentId' wire:model.defer="category.parent_id" :options="$categoryOptions" />
        </x-inputs.group>
    </div>
</div>
