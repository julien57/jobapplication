<?php

namespace tests;

use AppBundle\Twig\TVAPrice;
use PHPUnit\Framework\TestCase;

class TvaTest extends TestCase
{
    public function testTVAOne()
    {
        $tvaPrice = new TVAPrice();

        $this->assertSame(1.17, $tvaPrice->getTva(1, 'tva_one'));
        $this->assertSame(11.7, $tvaPrice->getTva(10, 'tva_one'));
    }

    public function testTVATwo()
    {
        $tvaPrice = new TVAPrice();

        $this->assertSame(1.20, $tvaPrice->getTva(1, 'tva_two'));
        $this->assertSame(12.0, $tvaPrice->getTva(10, 'tva_two'));
    }

    public function testHt()
    {
        $tvaPrice = new TVAPrice();

        $this->assertSame(1, $tvaPrice->getTva(1, 'ht'));
        $this->assertSame(10, $tvaPrice->getTva(10, 'ht'));
    }
}
