<div class="row">
    <div class="col-12">
        <div class="card">
            <div x-data="datatable()" class="card-body">

                <div class="col-sm-12 p-0 mb-2">
                    <div class="text-sm-left">
                        <button wire:loading.attr='disabled' wire:loading.class='not-allowed' type="button"
                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal"
                            data-target="#adminModalAction">
                            <i class="mdi mdi-plus mr-1"></i>
                            Add new {{ $title }}
                        </button>
                    </div>
                </div>

                <h4 class="card-title text-capitalize">{{ $title }} list</h4>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="search-box mr-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input wire:model.debounce.1000ms='search' type="search" placeholder="Search..."
                                    class="form-control">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-2 offset-sm-7'>
                        <div class="form-group row">
                            <label class="offset-md-3 col-md-4 pr-md-0 col-form-label text-capitalize">show</label>
                            <div class="col-md-5 pl-md-0">
                                <select wire:model.debounce.1000ms='perPage' class="custom-select">
                                    <option value='{{ 10 }}'>10</option>
                                    <option value='{{ 25 }}'>25</option>
                                    <option value='{{ 50 }}'>50</option>
                                    <option value='{{ 100 }}'>100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        Toggle column:
                        @foreach ($columns as $key => $column)
                            @unless($loop->first) - @endunless
                            <a @click="toggle({{ $key }})" data-column-selected="{{ $key }}" href="#"
                                class="toggle-vis">
                                {{ Str::of($column['name'])->snake()->replace('_', ' ')->title() }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover">

                        @include('partial.table.head')

                        <tbody>
                            @forelse ($elements as $element)
                                @include('partial.table.row')
                            @empty
                                @include('partial.table.empty-data')
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class='row'>
                    <div class="col-12 d-flex justify-content-end">
                        {{ $elements->links() ?? null }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function datatable() {
            return {
                columns: [],
                toggle(index) {
                    $(`[data-column='${index}']`).toggleClass('d-none');
                    $(`[data-column-selected='${index}']`).toggleClass('selected text-danger');
                }
            };
        }

    </script>
@endpush
