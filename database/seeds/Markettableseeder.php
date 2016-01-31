<?php
use App\Market;
use Illuminate\Database\Seeder;

class Markettableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Market', 1000)->create();
}
}