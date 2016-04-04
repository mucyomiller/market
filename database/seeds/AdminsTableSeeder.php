<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        Admin::create([
          'username'=>'mucyomiller',
          'password'=> Hash::make('1234'),
          'firstname'=>'mucyo',
          'lastname'=>'fred',
          'job_title'=>'Full stack developer',
          'education'=>'Bsc in Computer And Software Engineering',
          'location'=>'Kigali,Rwanda',
          'skills'=>'UI Design,Coding,Java,Python,PHP,JavaScript',
          'email'=>'mucyomiller@gmail.com'
          ]);
    }
}
