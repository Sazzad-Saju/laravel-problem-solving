<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name'=> 'John Doe', 'email'=> 'john@mail', 'department_id'=>1, 'blood_group_id'=>2],
            ['name'=> 'saju', 'email'=> 'saju@mail', 'department_id'=>2, 'password'=>bcrypt('87654321'), 'blood_group_id' =>1],
            ['name'=> 'anamika', 'email'=> 'anamika@mail', 'department_id'=>1, 'blood_group_id' =>1]
        ];


        foreach($datas as $data){
            DB::table('employees')->insert($data);
        }


        // Employee::create([
        //     'name'=> 'John Doe', 'email'=> 'john@mail', 'department'=>'support'
        // ]);
        // Employee::create(['name'=> 'saju', 'email'=> 'saju@mail', 'department'=>'software engineer', 'password'=>bcrypt('87654321')]);
        // Employee::create( ['name'=> 'anamika', 'email'=> 'anamika@mail', 'department'=>'technical']);

        //error bellow
        // DB::table('employees')->insert([
        //     ['name'=> 'John Doe', 'email'=> 'john@mail', 'department'=>'support'],
        //     ['name'=> 'saju', 'email'=> 'saju@mail', 'department'=>'software engineer', 'password'=>bcrypt('87654321')],
        //     ['name'=> 'anamika', 'email'=> 'anamika@mail', 'department'=>'technical'],
        // ]);
    }
}
