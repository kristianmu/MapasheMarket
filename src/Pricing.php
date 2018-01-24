<?php

declare(strict_types=1);


namespace Mapashe;


class Pricing
{
    private static $prices = [
        'apple' => 100,
        'banana' => 150,
        'cherry' => 75,
    ];

    public static function getFruitPrice($fruitName)
    {
        return isset(self::$prices[$fruitName]) ? self::$prices[$fruitName] : 0;
    }
}

