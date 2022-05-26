<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Pedro',
            'last_name' => 'Pedro',
            'email' => 'holguinpedro90@gmail.com',
            'gender' => 'Masculino',
            'phone' => '903023713',
            'address' => 'Direccion',
            'birthday' => 'Setiembre',
            'password' => bcrypt('12345')
            ])->assignRole(['Admin']);
        /* ])->syncRoles(['Admin','Usuario']); */

        User::factory(99)->create();
    }
}
