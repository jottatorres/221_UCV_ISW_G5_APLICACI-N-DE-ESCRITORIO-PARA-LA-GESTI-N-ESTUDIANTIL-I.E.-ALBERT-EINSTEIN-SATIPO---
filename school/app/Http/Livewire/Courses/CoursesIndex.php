<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    public $course;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete'];

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $rules = [
        'course.course_name' => 'required',
        'course.course_description' => 'required',

    ];

    public function render()
    {
        $courses = Course::where('id', 'LIKE', '%' . $this->search . '%')
            ->orwhere('course_name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('course_description', 'LIKE', '%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->latest('id')
            ->paginate(8);
        return view('livewire.courses.courses-index', compact('courses'));
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

    public function edit(Course $course)
    {

        $this->course = $course;
    }

    public function update()
    {
        $this->validate();
        $this->course->save();
        $this->emit('alert', '¡La categoría se actualizó correctamente!');
    }

    public function delete(Course $course)
    {
        $course->delete();
    }

    public function clearData()
    {
        $this->reset(['course_name', 'course_description']);
    }
}
