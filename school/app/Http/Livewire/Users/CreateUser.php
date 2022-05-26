<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

use Spatie\Permission\Models\Role;
class CreateUser extends Component
{

    public $first_name, $last_name, $email, $password, $gender, $phone, $address, $birthday, $roles_id;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        /* 'password' => 'required', */
        'gender' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'birthday' => 'required',
        'roles_id' => 'required'

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function save()
    {

        $this->validate();

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'roles_id' => $this->roles_id
        ]);

        $this->reset(['first_name', 'last_name', 'email', 'gender', 'phone', 'address', 'birthday', 'password']);
        $this->emit('render');
        $this->emit('alert', '¡La categoría se creó correctamente!');
    }

    public function ClearData()
    {
        $this->reset(['first_name', 'last_name', 'email', 'gender', 'phone', 'address', 'birthday', 'password']);
    }


    public function render()
    {
        $users = User::all();
        $roles = Role::get()->pluck('name', 'id');
        return view('livewire.users.create-user', compact('users', 'roles'));
    }


}
