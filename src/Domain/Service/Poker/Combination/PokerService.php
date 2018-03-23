<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 23/03/18
 * Time: 13:15
 */

namespace Kata\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Hand\Hand;

class PokerService implements Combination
{
    public function execute(Hand $hand): bool
    {
        $sameNumberCard = [];
        foreach ($hand->getHand() as $card) {
            $sameNumberCard[$card->getIdentifier()] = $card->getIdentifier();
        }

        return count($sameNumberCard) <= 2 && count($sameNumberCard) > 0 ? true : false;
    }

}