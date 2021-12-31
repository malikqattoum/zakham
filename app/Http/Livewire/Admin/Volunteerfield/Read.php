<?php

namespace App\Http\Livewire\Admin\Volunteerfield;

use App\Models\volunteerfield;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['volunteerfieldDeleted'];

    public $sortType;
    public $sortColumn;

    public function volunteerfieldDeleted(){
        // Nothing ..
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function render()
    {
        $data = Volunteerfield::query();

        $instance = getCrudConfig('volunteerfield');
        if($instance->searchable()){
            $array = (array) $instance->searchable();
            $data->where(function (Builder $query) use ($array){
                foreach ($array as $item) {
                    if(!is_array($item)) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $query->orWhereHas(array_key_first($item), function (Builder $query) use ($item) {
                            $query->where($item[array_key_first($item)], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        if($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('id');
        }

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.volunteerfield.read', [
            'volunteerfields' => $data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('Volunteerfield')) ]);
    }
}
