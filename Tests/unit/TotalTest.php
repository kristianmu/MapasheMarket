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
    public function known_fruits_csv_return_price()
    {
        $total = new Total();
        $this->assertEquals(325, $total->addFruit('banana,apple,cherry'));
    }

    /** @test */
    public function price_increases_properly()
    {
        $total = new Total();
        $this->assertEquals(230, $total->addFruit('apple,cherry,cherry'));
    }

    /** @test */
    public function adding_two_cherries_will_apply_discount()
    {
        $total = new Total();
        $this->assertEquals(130, $total->addFruit('cherry,cherry'));
    }

    /** @test */
    public function cherry_has_discount()
    {
        $this->assertTrue(Pricing::getFruitDiscount('cherry', 2) > 0);
    }

    /** @test */
    public function localisation_for_apple_returns_correct_price()
    {
        $this->assertEquals(Pricing::getFruitPrice('apple'), Pricing::getFruitPrice('manzana'));
        $this->assertEquals(Pricing::getFruitPrice('apple'), Pricing::getFruitPrice('apfel'));
    }

    /** @test */
    public function adding_two_bananas_will_apply_tow_discounts()
    {
        $total = new Total();
        $this->assertEquals(280, $total->addFruit('cherry,cherry,banana,banana'));
    }

    /** @test */
    public function adding_four_cherries_will_apply_tow_discounts()
    {
        $total = new Total();
        $this->assertEquals(260, $total->addFruit('cherry,cherry,cherry,cherry'));
    }

    /** @test */
    public function adding_two_apfel_will_apply_tow_discounts()
    {
        $total = new Total();
        $this->assertEquals(50, $total->addFruit('apfel,apfel'));
    }

    /** @test */
    public function adding_three_manzana_will_apply_tow_discounts()
    {
        $total = new Total();
        $this->assertEquals(200, $total->addFruit('manzana,manzana,manzana'));
    }

    /** @test */
    public function adding_four_apple_will_apply_tow_discounts()
    {
        $total = new Total();
        $this->assertEquals(250, $total->addFruit('apfel,manzana,manzana,apfel'));
    }

    /** @test */
    public function adding_five_fruits_will_apply_tow_discounts()
    {
        $total = new Total();
        $this->assertEquals(250, $total->addFruit('apfel,manzana,manzana,apfel'));
        $this->assertEquals(200, $total->addFruit('banana'));
        $this->assertEquals(250, $total->addFruit('apfel,manzana,manzana,apfel,apfel'));
    }
}
