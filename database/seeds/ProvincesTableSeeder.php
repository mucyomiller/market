<?php
use App\Province;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->truncate();
        $provinces  = array("city of kigali","northern province","southern province","estern province","western province");
        foreach ($provinces as $value) {
            Province::create(['province_name'=>$value]);
        }
    }
}
