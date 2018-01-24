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
        'banana' => 150, // Its free
    ];

    private static $localisation = [
        'manzana' => 'apple',
        'apfel' => 'apple',
    ];

    public static function getFruitPrice($fruitName): int
    {
        if(!isset(self::$prices[$fruitName])){
            $fruitName = isset(self::$localisation[$fruitName]) ? self::$localisation[$fruitName] : $fruitName;
        }

        return isset(self::$prices[$fruitName]) ? self::$prices[$fruitName] : 0;
    }

    public static function getFruitDiscount($fruitName): int
    {
        return isset(self::$discounts[$fruitName]) ? self::$discounts[$fruitName] : 0;
    }

    public static function fruitHasDiscount($fruitName): bool
    {
        return isset(self::$discounts[$fruitName]);
    }

    public static function isCherry($fruitName): bool
    {
        return $fruitName === 'cherry';
    }

    public static function isBanana($fruitName): bool
    {
        return $fruitName === 'banana';
    }
}

