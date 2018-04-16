<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 9/04/18
 * Time: 15:05
 */

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