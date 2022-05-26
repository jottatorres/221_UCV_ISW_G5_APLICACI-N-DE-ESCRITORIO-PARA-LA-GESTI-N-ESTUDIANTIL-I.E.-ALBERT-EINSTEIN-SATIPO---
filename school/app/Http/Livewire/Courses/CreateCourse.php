<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;

class CreateCourse extends Component
{
    public $course_name, $course_description;

    protected $rules = [
        'course_name' => 'required',
        'course_description' => 'required',

    ];

    public function save()
    {

        $this->validate();

        Course::create([
            'course_name' => $this->course_name,
            'course_description' => $this->course_description

        ]);

        $this->reset(['course_name', 'course_description']);
        $this->emit('render');
        $this->emit('alert', '¡El curso se creó correctamente!');
    }

    public function ClearData()
    {
        $this->reset(['course_name', 'course_description']);
    }

    public function render()
    {
        return view('livewire.courses.create-course');
    }
}
