<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Teacher::factory(100)->create();
        Semester::factory(10)->create();
        Course::factory(100)->create();

    }
}
