<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // clear and fill db
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Employee::truncate();
        Department::truncate();
        BloodGroup::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            DepartmentSeeder::class,
            BloodgroupSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
