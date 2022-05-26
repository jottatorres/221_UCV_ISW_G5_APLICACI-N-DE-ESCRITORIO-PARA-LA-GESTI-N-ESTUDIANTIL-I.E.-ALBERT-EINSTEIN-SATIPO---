<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherIndex extends Component
{
    public $teacher;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete'];

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $rules = [
        'teacher.first_name' => 'required',
        'teacher.last_name' => 'required',
        'teacher.email' => 'required',
        'teacher.gender' => 'required',
        'teacher.phone' => 'required',
        'teacher.address' => 'required',
        'teacher.birthday' => 'required',

    ];

    public function render()
    {
        $teachers = Teacher::where('id', 'LIKE', '%' . $this->search . '%')
        ->orwhere('first_name', 'LIKE', '%' . $this->search . '%')
        ->orwhere('last_name', 'LIKE', '%' . $this->search . '%')
        ->orderby($this->sort, $this->direction)
        ->latest('id')
        ->paginate(8);
        return view('livewire.teacher.teacher-index', compact('teachers'));
    }

    public function order($sort)
    {

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction == 'asc';
            } else {
                $this->direction == 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction == 'asc';
        }
    }

    public function edit(Teacher $teacher)
    {

        $this->teacher = $teacher;
    }

    public function update()
    {
        $this->validate();
        $this->teacher->save();
        $this->emit('alert', '¡La categoría se actualizó correctamente!');
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();
    }

    public function clearData()
    {
        $this->reset(['first_name', 'last_name','email','gender','phone','address','birthday']);
    }
}
