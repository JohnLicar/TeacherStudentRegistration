<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTable extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $perPage = 5;
    public $sortDirection = 'desc';
    public $search = '';

    public function render()
    {
        $students = User::search($this->search)
        ->whereRoleIs('student')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->Paginate($this->perPage);
        return view('livewire.student-table', compact('students'));
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
