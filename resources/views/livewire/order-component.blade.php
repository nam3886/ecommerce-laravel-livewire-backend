<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <x-partial.breadcrumb :title="__('orders')" />
            <livewire:partial.data-table-component title="Order" model="Order" tableName="orders" :columns="$columns" />
        </div>
    </div>
</div>

@section('title', 'Orders | Skote')
