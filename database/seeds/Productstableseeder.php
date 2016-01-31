<?php
use App\Product;
use Illuminate\Database\Seeder;

class Productstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        factory('App\Product', 1000)->create();
    }
}
