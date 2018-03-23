<?php
namespace Kata\Domain\Service\Poker\Combination\Util;

use Kata\Domain\Model\Hand\Hand;

class AllCardHaveTheSameColors
{
    /**
     * @param Hand $hand
     * @return bool
     */
    public function execute(Hand $hand): bool
    {
        $colorSames = [];
        foreach ($hand->getHand() as $card) {
            $colorSames[$card->getType()] = $card->getType();
        }

        return count($colorSames) === 1;
    }
}
