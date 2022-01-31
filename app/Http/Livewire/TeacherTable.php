<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherTable extends Component
{

    use WithPagination;
    public $sortBy = 'id';
    public $perPage = 5;
    public $sortDirection = 'desc';
    public $search = '';
    public $UserData = '';

    public function render()
    {
        $teachers = User::search($this->search)
        ->whereRoleIs('teacher')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->Paginate($this->perPage);
        return view('livewire.teacher-table', compact('teachers'));
    }

    public function confirmDelete(User $teacher){
         $this->UserData = $teacher->id;
    }

    public function delete(){

        User::find($this->UserData)->delete();
        session()->flash('message', 'sadfasdfasdfa');
        // return redirect()->to('admin/teacher');
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
