<?php

declare(strict_types=1);


namespace Mapashe;


class Total
{
    /** @var int */
    private $total;

    /** @var int */
    private $cherriesNumber;

    /** @var int */
    private $bananaNumber;

    public function __construct()
    {
        $this->total = 0;
        $this->cherriesNumber = 0;
        $this->bananaNumber = 0;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function addFruit($fruitNames): int
    {
        foreach (explode(',', $fruitNames) as $fruitName) {
            $fruitPrice = Pricing::getFruitPrice($fruitName);

            if (Pricing::isCherry($fruitName)) {
                $this->cherriesNumber++;

                if ($this->cherriesNumber % 2 === 0) {
                    $fruitPrice -= Pricing::getFruitDiscount($fruitName);
                }
            }

            if (Pricing::isBanana($fruitName)) {
                $this->bananaNumber++;

                if ($this->bananaNumber % 2 === 0) {
                    $fruitPrice -= Pricing::getFruitDiscount($fruitName);
                }
            }

            $this->total += $fruitPrice;
        }

        return $this->total;
    }
}
