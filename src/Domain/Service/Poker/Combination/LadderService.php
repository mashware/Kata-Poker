<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 9:19
 */

namespace Kata\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\ConsecutiveHand;

class LadderService implements Combination
{
    private $ConsecutiveHand;


    /**
     * LadderService constructor.
     */
    public function __construct(ConsecutiveHand $ConsecutiveHand)
    {
        $this->ConsecutiveHand = $ConsecutiveHand;
    }

    public function execute(Hand $hand): bool
    {
        if ($this->ConsecutiveHand->execute($hand)===false) {
            return false;
        }

        return true;
    }
}