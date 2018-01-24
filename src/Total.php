<?php

declare(strict_types=1);


namespace Mapashe;


class Total
{
    /** @var int */
    private $total;

    /** @var int */
    private $cherriesNumber;

    public function __construct()
    {
        $this->total = 0;
        $this->cherriesNumber = 0;
    }

    public function addFruit($fruitName): int
    {
        $fruitPrice = Pricing::getFruitPrice($fruitName);

        if ($this->isCherry($fruitName)) {
            $this->cherriesNumber++;

            if ($this->cherriesNumber % 2 === 0) {
                $fruitPrice-= Pricing::getFruitDiscount($fruitName);
            }
        }

        $this->total += $fruitPrice;

        return $this->total;
    }

    private function isCherry($fruitName): bool
    {
        return $fruitName === 'cherry';
    }
}
