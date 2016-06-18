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

$factory->define(\App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt("secret"),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Event::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->text(),
        'user_id' => $faker->numberBetween(1, 5),
        'datetime' => $faker->dateTimeThisYear(),
        'datetime_end' => $faker->dateTimeThisYear(),
        'venue' => serialize([$faker->sentence(), $faker->sentence()]),
        'published' => $faker->randomElement(["true"]),
    ];
});

$factory->define(\App\Models\EventType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word()
    ];
});

$factory->define(\App\Models\Package::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'event_id' => $faker->numberBetween(1, 5),
        'description' => $faker->text(),
        'fee_currency' => $faker->word(2),
        'fee_amount' => $faker->randomNumber(8),
        'fee_style' => $faker->randomElement(["Free", "Early bird", "Late"]),
    ];
});

$factory->define(\App\Models\PackageFeeType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word()
    ];
});

$factory->define(\App\Models\Media::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'event_id' => $faker->numberBetween(1, 5),
        'file' => $faker->imageUrl(),
        'url' => $faker->url(),
        'type' => $faker->randomElement(["image", "audio", "video"]),
    ];
});

$factory->define(\App\Models\Sponsor::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
        'event_id' => $faker->numberBetween(1, 5),
        'logo' => $faker->imageUrl(200, 200),
        'link' => $faker->url()
    ];
});

$factory->define(\App\Models\Award::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'event_id' => $faker->numberBetween(1, 5),
        'description' => $faker->text(),
        'enable_voting' => $faker->randomElement(['true', 'false']),
        'enable_registration' => $faker->randomElement(['true', 'false']),
        'voting_end_date' => $faker->dateTimeThisYear()
    ];
});

$factory->define(\App\Models\Contestant::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'award_id' => $faker->numberBetween(1, 10),
        'image' => $faker->imageUrl(),
        'description' => $faker->text(),
        'vote' => $faker->randomDigit()
    ];
});
