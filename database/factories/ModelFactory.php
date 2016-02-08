<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->unique()->phoneNumber,
        'personinfo_id' => $faker->numberBetween(1, 50),
        'market_id' => $faker->numberBetween(1, 1000),
        'category_id' => $faker->numberBetween(1, 24),
        'status' => $faker->numberBetween(0, 1),
        'password' => bcrypt("1234"),
    ];
});


$factory->define(App\PersonInfo::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname'=>$faker->lastName,
        'idnumber' => $faker->creditCardNumber,
    ];
});

$factory->define(App\Cell::class, function (Faker\Generator $faker) {
    return [
        'cell_name' => $faker->citySuffix,
        'sector_id'=>$faker->numberBetween(1, 403),
    ];
});

$factory->define(App\Market::class, function (Faker\Generator $faker) {
    return [
        'market_name' => $faker->citySuffix,
        'cell_id' => $faker->numberBetween(1, 1000),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'product_name' => $faker->word,
        'quantity_unit' => "per one",
        'category_id'=>$faker->numberBetween(1, 24),
    ];
});
$factory->define(App\Point::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->unique()->numberBetween(1, 50),
        'points'=>$faker->numberBetween(10, 100000),
    ];
});
$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->unique()->numberBetween(1, 10),
        'subject'=>$faker->sentence,
        'message'=>$faker->paragraph(5),
    ];
});
$factory->define(App\Price::class, function (Faker\Generator $faker) {
    return [
        'market_id' => $faker->numberBetween(1, 1000),
        'product_id'=> $faker->numberBetween(1, 1000),
        'current'=>$faker->dateTime(),
        'price'=>$faker->randomNumber(3),
        'user_id'=>$faker->numberBetween(1,50),
    ];
});