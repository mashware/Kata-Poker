<?php
namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;

class LadderRoyalService implements Combination
{
    public function execute(Hand $hand): bool
    {
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