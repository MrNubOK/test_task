<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        factory(User::class, 15)->create();
        factory(Department::class, 15)->create();
    }
}
