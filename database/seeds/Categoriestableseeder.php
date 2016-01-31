<?php
use App\Category;
use Illuminate\Database\Seeder;

class Categoriestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                 DB::table('categories')->truncate();
                 $categories=array("Air Fresheners",
"Alcoholic Beverages",
"Bathroom Cleaners",
"Beans",
"Beverages",
"Bird Care",
"Bread",
"Breakfast Foods",
"Breath Fresheners and Gums",
"Burns, Wounds, Scars",
"Butters",
"Candy",
"Cat Food",
"Children’s Health",
"Chips",
"Chocolate",
"Cleaning Supplies",
"Eggs",
"Fruits",
"Rice",
"Sugars & Sweeteners",
"Tea & Coffee",
"Water",
"Yogurt");
                  foreach ($categories as $value) {
            Category::create(['category_name'=>$value]);
         }

    }
}
