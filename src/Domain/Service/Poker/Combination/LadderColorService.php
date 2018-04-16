<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 11:55
 */

namespace Kata\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;
use Kata\Domain\Service\Poker\Combination\Util\CardSequenceOrder;

class LadderColorService extends Combination
{
    public function execute(Hand $hand): bool
    {
        return (new CardSequenceOrder())
                ->execute($hand)
            && (new AllCardHaveTheSameColors())
                ->execute($hand)
            && $this->hasNotAce($hand);
    }

    public function getType(): string
    {
        return TypeHand::TYPE_LADDER_COLOR;
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