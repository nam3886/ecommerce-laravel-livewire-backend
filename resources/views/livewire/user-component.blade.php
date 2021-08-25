<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('users')" />
            <livewire:partial.data-table-component title="User" model="User" tableName="users" :columns="$columns" />
        </div>
    </div>
</div>

@section('title', 'User Management | Skote')
