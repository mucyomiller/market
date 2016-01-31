<?php

use App\PersonInfo;
use Illuminate\Database\Seeder;

class PersoninfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory('App\PersonInfo', 50)->create();
    }
}
