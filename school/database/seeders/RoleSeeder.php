<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);
        $role3 = Role::create(['name' => 'Profesor']);
        $role4 = Role::create(['name' => 'Alumno']);

        Permission::create(['name' => 'admin'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'users.index'])->assignRole($role1);
        Permission::create(['name' => 'courses.index'])->assignRole($role1);
        Permission::create(['name' => 'semesters.index'])->assignRole($role1);
        Permission::create(['name' => 'reports.index'])->assignRole($role1);



        Permission::create(['name' => 'student.index'])->assignRole($role2);
        Permission::create(['name' => 'teachers.index'])->assignRole($role2);



    }
}
