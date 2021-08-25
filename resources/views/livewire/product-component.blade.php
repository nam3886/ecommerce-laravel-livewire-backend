<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('products')" />
            <livewire:partial.data-table-component title="Product" model="Product" tableName="products"
                :columns="$columns" relations="gallery" />
        </div>
    </div>

    <x-forms.action-form :isUpdate="$isUpdate" :fields="$product">
        <x-slot name='title'>
            {{ $isUpdate ? "Update product with name: {$product['name']}" : 'Create new product' }}
        </x-slot>
        @include('partial.form.product')
    </x-forms.action-form>
    <x-forms.scroll-error-form />
</div>

@section('title', 'Products | Skote')
