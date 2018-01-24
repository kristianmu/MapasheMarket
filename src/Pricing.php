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

    private static $discounts = [
        'cherry' => 20,
    ];

    public static function getFruitPrice($fruitName): int
    {
        return isset(self::$prices[$fruitName]) ? self::$prices[$fruitName] : 0;
    }

    public static function getFruitDiscount($fruitName): int
    {
        return isset(self::$discounts[$fruitName]) ? self::$discounts[$fruitName] : 0;
    }
}

