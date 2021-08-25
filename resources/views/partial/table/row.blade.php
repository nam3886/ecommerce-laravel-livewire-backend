<tr>
    <td>
        <div class="custom-control custom-checkbox">
            <input wire:model='select.items' type="checkbox" id="customCheck{{ $element->id }}"
                value="{{ $element->id }}" class="custom-control-input">
            <label for="customCheck{{ $element->id }}" class="custom-control-label">&nbsp;</label>
        </div>
    </td>

    @foreach ($columns as $key => $column)
        <td wire:ignore.self data-column="{{ $key }}" style="max-width: 100px">
            @switch($column['name'])
                @case('active')
                    <div class='text-center align-middle'>
                        <livewire:actions.toggle-active-component :key="'toggle'.$element->id.$element->active"
                            :element="$element" />
                    </div>
                @break

                @case('action')
                    <div class='text-center align-middle'>
                        <x-partial.table-action :element="$element" />
                    </div>
                @break

                @case('image')
                    <div class='text-center align-middle'>
                        <x-images.lazy :src="$element->imageString()" class='border' />
                    </div>
                @break

                @case('avatar')
                    <div class='text-center align-middle'>
                        <x-images.lazy :src="$element->gallery->avatarString()" class='border' />
                    </div>
                @break

                @case('created_at')
                    <div class='text-truncate text-center align-middle'>
                        {{ $element->created_at->diffForHumans() }}
                    </div>
                @break

                @case('price')
                @case('total_price')
                    <div class='text-truncate text-center align-middle'>
                        {{ moneyFormat($element->{$column['name']}) }}
                    </div>
                @break

            @case('is_paid')
                <div class='text-truncate text-center align-middle'>
                    <i class="paid {{ $element->is_paid ? 'bx bx-check' : 'bx bx-x' }}"></i>
                </div>
            @break

        @case('order_success')
            <div class='text-truncate text-center align-middle'>
                <i class="paid {{ $element->order_success ? 'bx bx-check' : 'bx bx-x' }}"></i>
            </div>
        @break

        @default
            <div class='text-truncate text-center align-middle'>
                {{ $element->{$column['name']} }}
            </div>
    @endswitch
</td>
@endforeach
</tr>
