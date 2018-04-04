<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 9:44
 */

namespace Kata\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;

class ColorService implements Combination
{
    private $AllCardHaveTheSameColor;

    /**
     * ColorService constructor.
     * @param $AllCardHaveTheSameColor
     */
    public function __construct(AllCardHaveTheSameColors $AllCardHaveTheSameColor)
    {
        $this->AllCardHaveTheSameColor = $AllCardHaveTheSameColor;
    }

    public function execute(Hand $hand) :bool
    {
        if ($this->AllCardHaveTheSameColor->execute($hand)===false) {
            return false;
        }

        return true;
    }

}