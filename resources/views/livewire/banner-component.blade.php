<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('banner')" />
            <livewire:partial.data-table-component title="Banner" model="Banner" tableName="banners"
                :columns="$columns" />
        </div>
    </div>

    <x-forms.action-form :isUpdate="$isUpdate" :fields="$banner">
        <x-slot name='title'>
            {{ $isUpdate ? "Update banner with id: {$banner['id']}" : 'Create new banner' }}
        </x-slot>
        @include('partial.form.banner')
    </x-forms.action-form>
    <x-forms.scroll-error-form />
</div>

@section('title', 'Banners | Skote')
