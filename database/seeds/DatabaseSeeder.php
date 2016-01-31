<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
            DB::table('personinfos')->truncate();
            DB::table('cells')->truncate();

        $this->call(UsersTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(Sectorstableseeder::class);
        $this->call(Celltableseeder::class);
        $this->call(Categoriestableseeder::class);
        $this->call(Productstableseeder::class);
        $this->call(Markettableseeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PersoninfoTableSeeder::class);
        $this->call(PointsTableSeeder::class);
        Model::reguard();
    }
}
