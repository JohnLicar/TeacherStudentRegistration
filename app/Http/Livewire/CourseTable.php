<?php

namespace App\Http\Livewire;


use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseTable extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $perPage = 5;
    public $sortDirection = 'desc';
    public $search = '';

    public function render()
    {
        $courses = Course::search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->Paginate($this->perPage);
        return view('livewire.course-table', ['courses' => $courses]) ;
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
