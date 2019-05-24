<?php

namespace AppBundle\Twig;

use AppBundle\Entity\Product;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TVAPrice extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('tva_one', [$this, 'getTvaOne']),
            new TwigFilter('tva_two', [$this, 'getTvaTwo'])
        ];
    }

    /**
     * @param int $price
     * @return float|int
     */
    public function getTvaOne(int $price)
    {
        return $price * Product::PERCENT_TVA_ONE;
    }

    /**
     * @param int $price
     * @return float|int
     */
    public function getTvaTwo(int $price)
    {
        return $price * Product::PERCENT_TVA_TWO;
    }
}
