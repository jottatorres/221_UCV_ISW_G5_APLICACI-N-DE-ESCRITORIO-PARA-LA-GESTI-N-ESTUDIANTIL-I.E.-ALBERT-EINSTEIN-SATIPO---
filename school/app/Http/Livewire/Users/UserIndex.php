<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Http\Client\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public $user;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete'];

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $rules = [
        'user.first_name' => 'required',
        'user.last_name' => 'required',
        'user.email' => 'required',
        /* 'user.password' => 'required', */
        'user.gender' => 'required',
        'user.phone' => 'required',
        'user.address' => 'required',
        'user.birthday' => 'required',
        'user.roles_id' => 'required'

    ];

    public function edit(User $user)
    {

        $this->user = $user;
    }


    public function render()
    {

        $users = User::where('id', 'LIKE', '%' . $this->search . '%')
            ->orwhere('first_name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('last_name', 'LIKE', '%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->latest('id')
            ->paginate(8);
        $roles = Role::all();
        return view('livewire.users.user-index', compact('users', 'roles'));
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

    public function update()
    {
        $this->validate();
        $this->user->save();
        $this->emit('alert', '¡La categoría se actualizó correctamente!');
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function clearData()
    {
        $this->reset(['first_name', 'last_name','email','gender','phone','address','birthday','password']);
    }
}
