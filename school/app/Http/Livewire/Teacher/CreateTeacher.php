<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class CreateTeacher extends Component
{
    public $first_name, $last_name, $email, $gender, $phone, $address, $birthday;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'birthday' => 'required',

    ];


    public function save()
    {

        $this->validate();

        Teacher::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,
            'birthday' => $this->birthday,

        ]);

        $this->reset(['first_name', 'last_name', 'email', 'gender', 'phone', 'address', 'birthday']);
        $this->emit('render');
        $this->emit('alert', '¡La categoría se creó correctamente!');
    }

    public function ClearData()
    {
        $this->reset(['first_name', 'last_name', 'email', 'gender', 'phone', 'address', 'birthday']);
    }

    public function render()
    {

        return view('livewire.teacher.create-teacher');
    }
}
