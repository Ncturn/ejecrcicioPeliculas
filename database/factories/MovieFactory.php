<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class,function(Faker $faker){
    return [
        'title' => $faker->words(3, true),
        'synopsis' => $faker->realText(random_int(60,160)),
        'review' => $faker->realText(random_int(60,160)),
        'poster' => $faker->imageUrl(200,300),
        'date' => $faker->date()
    ];
});
