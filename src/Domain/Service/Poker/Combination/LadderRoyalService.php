<?php
namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;
use Kata\Domain\Service\Poker\Combination\Util\CardSequenceOrder;

class LadderRoyalService implements Combination
{
    public function execute(Hand $hand): bool
    {
        return (new CardSequenceOrder())
                ->execute($hand)
            && (new AllCardHaveTheSameColors())
                ->execute($hand)
            && $this->hasAce($hand);
    }

    public function getType(): string
    {
        return TypeHand::TYPE_LADDER_ROYAL;
    }

    private function hasAce(Hand $hand): bool
    {
        foreach ($hand->getHand() as $card) {
            if ($card->getIdentifier() == 1) {
                return true;
            }
        }

        return false;
    }
}