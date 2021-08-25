<thead class="thead-light">
    <tr class="text-center text-capitalize">

        <th style="width: 20px; text-align: left;">
            <div class="custom-control custom-checkbox">
                <input wire:model='select.all' type="checkbox" id="customCheckAll" class="custom-control-input">
                <label for="customCheckAll" class="custom-control-label">
                    &nbsp;
                </label>
            </div>
        </th>

        @foreach ($columns as $key => $column)
        <th wire:ignore.self data-column="{{ $key }}">
            @if ($column['sortable'] ?? null)
            <div wire:click="sortBy('{{ $column['name'] }}')" wire:loading.class='not-allowed' class='pointer'>
                <i class="cs-sort bx bx-sort"></i>{{ __($column['name']) }}
            </div>
            @else
            <div>{{ __($column['name']) }}</div>
            @endif
        </th>
        @endforeach
    </tr>
</thead>