<?php

namespace App\Http\Livewire;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class SectionTable extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $perPage = 5;
    public $sortDirection = 'desc';
    public $search = '';

    public function render()
    {
        $sections = Section::search($this->search)->with('yearLevel', 'course')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->Paginate($this->perPage);
        return view('livewire.section-table', ['sections' => $sections]) ;
    }

    public function sortBy($field){
        $this->sortDirection == 'desc' ? $this->sortDirection = 'asc' : $this->sortDirection = 'desc';
        return $this->sortBy = $field;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

}
