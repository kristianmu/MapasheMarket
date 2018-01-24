<?php

declare(strict_types=1);


namespace Mapashe;


class Total
{
    /** @var int */
    private $total;

    /** @var array */
    private $fruitNumber;

    /** @var int */
    private $totalFruits;

    public function __construct()
    {
        $this->total = 0;
        $this->totalFruits = 0;
        $this->fruitNumber = [];
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function addFruit($fruitNames): int
    {
        foreach (explode(',', $fruitNames) as $fruitName) {
            $this->totalFruits++;

            if(!isset($this->fruitNumber[$fruitName])){
                $this->fruitNumber[$fruitName] = 1;
            } else{
                $this->fruitNumber[$fruitName]++;
            }

            $fruitPrice = Pricing::getFruitPrice($fruitName);

            if (Pricing::fruitHasDiscount($fruitName, $this->fruitNumber[$fruitName])) {
                $fruitPrice -= Pricing::getFruitDiscount($fruitName, $this->fruitNumber[$fruitName]);
                unset($this->fruitNumber[$fruitName]);
            }

            $this->total += $fruitPrice;

            if($this->totalFruits % 5 === 0){
                $this->total -= 200;
            }
        }

        return $this->total;
    }
}
