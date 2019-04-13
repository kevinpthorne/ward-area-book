<?php

use App\Companionship;
use App\District;
use App\Person;
use App\User;
use App\Visit;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'user_type' => $faker->randomKey([
            User::USER_TYPE_NORMAL,
            User::USER_TYPE_NORMAL,
            User::USER_TYPE_NORMAL,
            User::USER_TYPE_LEADER,
        ]),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->phoneNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'type' => $faker->randomElement([
            "Less-Active",
            "Part-Member Family",
            "Investigator",
            "Recent Convert",
        ]),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'background_information' => $faker->text()
    ];
});

$factory->define(Visit::class, function (Faker $faker) {
    return [
        'datetime_visited' => $faker->dateTime,
        'met' => $faker->boolean,
        'visit_summary' => $faker->text(),
        'attended_church_this_week' => $faker->boolean,
        'record_of_bom_reading' => $faker->words(1, true),
        'person_id' => function () {
            return factory(Person::class)->create()->id;
        }
    ];
});

$factory->define(District::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName
    ];
});

$factory->define(Companionship::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'missionary_1' => function () {
            return factory(User::class)->create()->id;
        },
        'missionary_2' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
