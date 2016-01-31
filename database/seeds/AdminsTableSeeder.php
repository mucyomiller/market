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
          'email'=>'mucyomiller@gmail.com'
          ]);
    }
}
