<?php

use Faker\Generator as Faker;

$factory->define(App\Worker::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->safeEmail
    ];
});

$factory->define(App\Truck::class, function (Faker $faker) {
    return [
        'plate' => $faker->unique()->bothify('???-###')
    ];
});

$factory->define(App\Subcontractor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber
    ];
});

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'tax' => $faker->numerify('########-#-##'),
        'bill_zip' => $faker->numerify('####'),
        'bill_country' => 'Magyarország',
        'bill_city' => $faker->city(),
        'bill_address' => $faker->streetAddress(),
        'post_zip' => $faker->numerify('####'),
        'post_country' => 'Magyarország',
        'post_address' => $faker->streetAddress()
    ];
});

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_id' => $faker->numberBetween($min = 1, $max = 15),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber
    ];
});

$factory->define(App\Work::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween($min = 1, $max = 15),
        'date' => $faker->dateTimeThisMonth($max = 'now + 7 days'),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'lead' => $faker->text($maxNbChars = 50)
    ];
});

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeThisMonth($max = 'now + 7 days'),
        'note' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});