<?php

use Faker\Generator as Faker;

//$factory->define(App\Comment::class, function (Faker $faker) {
//    $postNumbers = App\Post::pluck('postNumber')->toArray();
//    $userNumbers = App\User::pluck('userNumber')->toArray();
//    
//    return [
//        'commentContent' => $faker->paragraph,
//        'commentableType' => App\Post::class,
//        'commentableUserNumber' => function () use ($faker, $postNumbers){
//            return $faker->randomElement($postNumbers);
//        },
//        'userNumber' => function () user ($faker, $userNumbers){
//            return $faker->randwomElement($userNumbers);
//        },
//    ];
//});
//
//$factory->define(App\Vote::class, function (Faker $faker) {
//    $up = $faker->randomElement([true, false]);
//    $down = ! $up;
//    $userNumbers = App\User::pluck('userNumber')->toArray();
//    
//    return [
//        'up' -> $up ? 1 : null,
//        'down' => $down ? 1 : null,
//        'userNumber' => function () use ($faker, $userNumbers){
//            return $faker->randomElement($userNumbers);
//        },
//    ];
//});