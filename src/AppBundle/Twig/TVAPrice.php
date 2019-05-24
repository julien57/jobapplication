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
            new TwigFilter('tva', [$this, 'getTva'])
        ];
    }

    /**
     * @param int $price
     * @return float|int
     */
    public function getTva(int $price, string $tvaType)
    {
        if ($tvaType === 'tva_one') {
            return $price * Product::PERCENT_TVA_ONE;

        } elseif ($tvaType === 'tva_two') {
            return $price * Product::PERCENT_TVA_TWO;

        } else {
            return $price;
        }
    }
}
