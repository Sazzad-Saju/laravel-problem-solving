<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_groups')->insert([
            ['name'=>'A+'],
            ['name'=>'A-'],
            ['name'=>'B+'],
            ['name'=>'B-'],
            ['name'=>'AB+'],
            ['name'=>'AB-'],
            ['name'=>'O+'],
            ['name'=>'O-']
        ]);
    }
}
