<?php
namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;
use Kata\Domain\Service\Poker\Combination\Util\ConsecutiveHand;


class LadderRoyalService implements Combination
{

    private $AllCardHaveTheSameColor;
    private $ConsecutiveHand;


    /**
     * LadderRoyalService constructor.
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
        if ($this->hasNotAce($hand)) {
            return false;
        }

        return true;
    }

    private function hasNotAce(Hand $hand): bool
    {
        foreach ($hand->getHand() as $card) {
            if ($card->getIdentifier() === 1) {
                return false;
            }
        }

        return true;
    }
}