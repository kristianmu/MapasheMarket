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
        'apple' => [
            4 => 20
        ],
        'cherry' => [
            2 => 20
        ],
        'banana' => [
            2 => 150 // Its free
        ],
        'apfel' => [
            2 => 150
        ],
        'manzana' => [
            3 => 100
        ],
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

    public static function getFruitDiscount($fruitName, $fruitNumber): int
    {
        return isset(self::$discounts[$fruitName][$fruitNumber]) ? self::$discounts[$fruitName][$fruitNumber] : 0;
    }

    public static function fruitHasDiscount($fruitName, $fruitNumber): bool
    {
        return isset(self::$discounts[$fruitName][$fruitNumber]);
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

