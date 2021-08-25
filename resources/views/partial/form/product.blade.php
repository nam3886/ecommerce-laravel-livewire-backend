<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-custom nav-justified mx-md-5" role="tablist">
    <li class="nav-item">
        <a wire:ignore.self class="nav-link active" data-toggle="tab" href="#requireFiled" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-exclamation-circle"></i></span>
            <span class="d-none d-sm-block">Required field</span>
        </a>
    </li>
    <li class="nav-item">
        <a wire:ignore.self class="nav-link" data-toggle="tab" href="#variantFiled" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cogs"></i></span>
            <span class="d-none d-sm-block">Variant field</span>
        </a>
    </li>
    <li class="nav-item">
        <a wire:ignore.self class="nav-link" data-toggle="tab" href="#metaDataField" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-tags"></i></span>
            <span class="d-none d-sm-block">Meta Data</span>
        </a>
    </li>
    <li class="nav-item">
        <a wire:ignore.self class="nav-link" data-toggle="tab" href="#ImagesField" role="tab">
            <span class="d-block d-sm-none"><i class="far fa-images"></i></span>
            <span class="d-none d-sm-block">Images field</span>
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
        <x-inputs.group for="productName" label='name' model="product.name">
            <x-inputs.text placeholder="STAN SMITH MULE..." id='productName' required wire:model.defer="product.name" />
        </x-inputs.group>

        <x-inputs.group for="productContent" label='content' model="product.content">
            <x-inputs.textarea placeholder="How do I content web..." id='productContent' required
                wire:model.defer="product.content" />
        </x-inputs.group>

        <x-inputs.group for="productDescription" label='description' model="product.description">
            <x-inputs.textarea placeholder="How do I description web..." id='productDescription' required
                wire:model.defer="product.description" />
        </x-inputs.group>

        <x-inputs.group for="productBrandId" label='brand' model="product.brand_id">
            <x-inputs.select id='productBrandId' required wire:model.defer="product.brand_id"
                :options="$brandOptions" />
        </x-inputs.group>

        <x-inputs.group for="productCategoryId" label='Categories' model="product.categories_id">
            <x-inputs.multiple-select id='productCategoryId' required wire:model.defer="product.categories_id"
                :options="$categoryOptions" />
        </x-inputs.group>

        <x-inputs.group for="productActive" label='active' model="product.active">
            <x-inputs.select id='productActive' required wire:model.defer="product.active" />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="variantFiled" role="tabpanel">
        <div x-data="handler()">
            <button type="button" class="btn btn-info mb-1" @click="addNewField()">
                + Add Variant</button>
            <template x-for="(field, index) in fields" :key="index">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="formrow-inputState">Variant</label>
                            <select id="formrow-inputState" class="custom-select">
                                <option selected="">Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="formrow-inputState">Value</label>
                            <select id="formrow-inputState" class="custom-select">
                                <option selected="">Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="formrow-inputZip">Price</label>
                            <input type="text" class="form-control" id="formrow-inputZip" x-model="field.txt1"
                                name="txt1[]">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="formrow-inputZip">Quantity</label>
                            <input type="text" class="form-control" id="formrow-inputZip" x-model="field.txt2"
                                name="txt2[]">
                        </div>
                    </div>
                    <div class='col'>
                        <button type="button" class="btn btn-danger btn-small align-bottom" @click="removeField(index)">
                            &times;
                        </button>
                    </div>
                </div>
            </template>
        </div>

    </div>
    <div wire:ignore.self class="tab-pane" id="metaDataField" role="tabpanel">
        <x-inputs.group for="productSeo_title" label='seo title' model="product.seo_title">
            <x-inputs.text placeholder="STAN SMITH MULE..." id='productSeo_title' required
                wire:model.defer="product.seo_title" />
        </x-inputs.group>

        <x-inputs.group for="productSeo_keyword" label='seo keywords' model="product.seo_keyword">
            <x-inputs.text placeholder="STAN SMITH MULE..." id='productSeo_keyword' required
                wire:model.defer="product.seo_keyword" />
        </x-inputs.group>

        <x-inputs.group for="productSeo_description" label='seo description' model="product.seo_description">
            <x-inputs.textarea placeholder="How do I description web..." id='productSeo_description' required
                wire:model.defer="product.seo_description" />
        </x-inputs.group>

        <x-inputs.group for="productSeo_image" label='seo image' model="seoImage">
            <x-inputs.filepond id='productSeo_image' required data-max-file-size="1MB"
                accept="image/png, image/jpeg, image/gif" wire:model.defer="seoImage" :image="$seoImage" />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="ImagesField" role="tabpanel">
        <x-inputs.group for="productAvatar" label='avatar' model="avatar">
            <x-inputs.filepond id='productAvatar' required data-max-file-size="1MB"
                accept="image/png, image/jpeg, image/gif" wire:model.defer="avatar" :image="$avatar" />
        </x-inputs.group>

        <x-inputs.group for="productImages" label='images' model="images">
            <x-inputs.filepond-multiple id='productImages' required data-max-file-size="3MB" data-max-files="3" required
                accept="image/png, image/jpeg, image/gif" wire:model.defer="images" :oldImagesValue="$oldImages"
                oldImagesName="oldImages" />
        </x-inputs.group>
    </div>
    <div wire:ignore.self class="tab-pane" id="nullableField" role="tabpanel">
        <x-inputs.group for="productDiscountUnitId" label='discount unit' model="product.discount_unit_id">
            <x-inputs.select id='productDiscountUnitId' required wire:model.defer="product.discount_unit_id"
                :options="$unitOptions" />
        </x-inputs.group>

        <x-inputs.group for="productDiscount" label='discount' model="product.discount">
            <x-inputs.text placeholder="1000000" id='productDiscount' wire:model.defer="product.discount" />
        </x-inputs.group>

        <x-inputs.group for="productView" label='view' model="product.view">
            <x-inputs.text placeholder="1000000" id='productView' wire:model.defer="product.view" />
        </x-inputs.group>

        <x-inputs.group for="productFlag" label='flag' model="product.flag">
            <x-inputs.text placeholder="New..." id='productFlag' wire:model.defer="product.flag" />
        </x-inputs.group>
    </div>
</div>

@push('scripts')
    <script>
        function handler() {
            return {
                fields: [],
                addNewField() {
                    this.fields.push({
                        txt1: '',
                        txt2: ''
                    });
                },
                removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }

    </script>
@endpush
