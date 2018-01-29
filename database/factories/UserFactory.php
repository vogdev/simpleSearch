<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'birthdate' => $faker->unique()->date,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'img' => function () {
            $images = ["http://www.spagobi.org/jira/secure/useravatar?size=xsmall&avatarId=11649", "http://www.spagobi.org/jira/secure/projectavatar?pid=10000&https://jira.fiware.org/secure/projectavatar?avatarId=10011=10011","https://issues.jenkins-ci.org/secure/useravatar?size=small&avatarId=16489","https://issues.jenkins-ci.org/secure/useravatar?size=small&avatarId=16495"];
            return $randomImage = array_random($images);
        }

    ];
});
