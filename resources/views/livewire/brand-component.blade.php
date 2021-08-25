<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('brand')" />
            <livewire:partial.data-table-component title="Brand" model="Brand" tableName="brands" />
        </div>
    </div>

    <x-forms.action-form :isUpdate="$isUpdate" :fields="$brand">
        <x-slot name='title'>
            {{ $isUpdate ? "Update brand with name: {$brand['name']}" : 'Create new brand' }}
        </x-slot>
        @include('partial.form.brand')
    </x-forms.action-form>
    <x-forms.scroll-error-form />
</div>

@section('title', 'Brands | Skote')
