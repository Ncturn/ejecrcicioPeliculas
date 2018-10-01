<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class,function(Faker $faker){
    return [
        'titulo' => $faker->words(3, true),
        'sinopsis' => $faker->realText(random_int(60,160)),
        'resena' => $faker->realText(random_int(60,160)),
        'poster' => $faker->imageUrl(200,300),
        'fecha' => $faker->date()
    ];
});
