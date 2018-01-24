<?php

declare(strict_types=1);


namespace Mapashe;


class Total
{
    /** @var int */
    private $total;

    public function __construct()
    {
        $this->total = 0;
    }

    public function addFruit($fruitName){
        $this->total += Pricing::getFruitPrice($fruitName);

        return $this->total;
    }
}
