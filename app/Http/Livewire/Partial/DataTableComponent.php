<?php

namespace App\Http\Livewire\Partial;

use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class DataTableComponent extends Component
{
    use WithPagination;

    public string   $title      =   '';
    public string   $model      =   '';
    public string   $relations  =   '';
    public string   $tableName  =   '';
    public string   $search     =   '';
    public int      $perPage    =   10;
    public array    $sort       =   [
        'by'        => 'id',
        'direction' => 'asc',
    ];
    public array    $select     =   [
        'items' => [],
        'all'   => false,
        'total' => 0
    ];
    public array    $columns    =   [
        ['name' => 'id', 'sortable' => true],
        ['name' => 'name', 'sortable' => true],
        ['name' => 'created_at', 'sortable' => true],
        ['name' => 'active'],
        ['name' => 'action']
    ];

    protected $paginationTheme  =   'bootstrap';
    protected       $listeners  =   ['table-re-render' => '$refresh'];

    public function render()
    {
        $model = 'App\\Models\\' . $this->model;
        $elements = $model::search($this->search);
        // has relations => get relations
        $this->relations && $elements = $elements->with(...explode(',', $this->relations));
        // order and paginate
        $elements = $elements->orderBy($this->sort['by'], $this->sort['direction'])->paginate($this->perPage);
        $this->select['total'] = $elements->count();

        return view('livewire.partial.data-table-component', compact('elements'));
    }

    protected function updatingSearch(): void
    {
        $this->resetPage();
        $this->reset('select');
    }

    protected function updatedSelectItems(): void
    {
        $this->select['all'] = count($this->select['items']) === $this->select['total'];
    }

    protected function updatedSelectAll(bool $value): void
    {
        $model = 'App\\Models\\' . $this->model;

        $this->select['items'] = $value
            ? $model::select('id')
            ->pluck('id')
            ->map(fn ($item) => strval($item))
            ->toArray()
            : [];
    }

    public function sortBy($field): void
    {
        if (!isset($this->tableName) || !Schema::hasColumn($this->tableName, $field)) return;
        // the number of presses is even => toggle asc => desc
        $this->sort['direction'] = $this->sort['by'] === $field ? $this->reverseSort() : 'asc';
        $this->sort['by'] = $field;
    }

    protected function reverseSort(): string
    {
        return $this->sort['direction'] === 'asc' ? 'desc' : 'asc';
    }
}
