<?php declare(strict_types=1);

namespace Test\Unit;

use Mapashe\Pricing;
use Mapashe\Total;
use PHPUnit\Framework\TestCase;

class TotalTest extends TestCase
{
    /** @test */
    public function known_fruits_return_price()
    {
        $this->assertEquals(150, Pricing::getFruitPrice('banana'));
        $this->assertEquals(100, Pricing::getFruitPrice('apple'));
        $this->assertEquals(75, Pricing::getFruitPrice('cherry'));
    }

    /** @test */
    public function unknown_fruits_return_zero()
    {
        $this->assertEquals(0, Pricing::getFruitPrice('kiwi'));
    }

    /** @test */
    public function price_increases_properly()
    {
        $total = new Total();
        $this->assertEquals(100, $total->addFruit('apple'));
        $this->assertEquals(175, $total->addFruit('cherry'));
        $this->assertEquals(250, $total->addFruit('cherry'));
    }
}
