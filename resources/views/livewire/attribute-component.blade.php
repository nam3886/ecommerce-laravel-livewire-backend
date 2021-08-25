<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('attributes')" />
            <livewire:partial.data-table-component title="Attribute" model="Attribute" tableName="attributes" />
        </div>
    </div>

    <x-forms.action-form :isUpdate="$isUpdate" :fields="$attribute">
        <x-slot name='title'>
            {{ $isUpdate ? "Update attribute with id: {$attribute['id']}" : 'Create new attribute' }}
        </x-slot>
        @include('partial.form.attribute')
    </x-forms.action-form>
    <x-forms.scroll-error-form />
</div>

@section('title', 'Attributes | Skote')
