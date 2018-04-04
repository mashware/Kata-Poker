<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 9:04
 */

namespace Kata\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;
use Kata\Domain\Service\Poker\Combination\Util\ConsecutiveHand;

class LadderColorService implements Combination
{
    private $AllCardHaveTheSameColor;
    private $ConsecutiveHand;


    /**
     * LadderColorService constructor.
     */
    public function __construct(
        AllCardHaveTheSameColors $AllCardHaveTheSameColor,
        ConsecutiveHand $ConsecutiveHand
    ) {
        $this->AllCardHaveTheSameColor = $AllCardHaveTheSameColor;
        $this->ConsecutiveHand = $ConsecutiveHand;
    }

    public function execute(Hand $hand): bool
    {
        if ($this->ConsecutiveHand->execute($hand)===false
            || $this->AllCardHaveTheSameColor->execute($hand)===false) {
            return false;
        }

        return true;
    }
}