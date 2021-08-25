<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('categories')" />
            <livewire:partial.data-table-component title="Category" model="Category" tableName="categories" />
        </div>
    </div>

    <x-forms.action-form :isUpdate="$isUpdate" :fields="$category">
        <x-slot name='title'>
            {{ $isUpdate ? "Update category with name: {$category['name']}" : 'Create new category' }}
        </x-slot>
        @include('partial.form.category')
    </x-forms.action-form>
    <x-forms.scroll-error-form />
</div>

@section('title', 'Categories | Skote')
