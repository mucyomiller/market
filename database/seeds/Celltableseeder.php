<?php
use App\Cell;
use Illuminate\Database\Seeder;

class Celltableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Cell', 1020)->create();
    }
}
