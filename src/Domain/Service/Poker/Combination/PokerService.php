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
        $arrayOfIdentifiers = [];
        foreach ($hand->getHand() as $card) {
            $arrayOfIdentifiers[] = $card->getIdentifier();
        }

        $sameNumberCardCount = array_count_values($arrayOfIdentifiers);
        rsort($sameNumberCardCount);

        return $sameNumberCardCount[0] === 4 ? true : false;
    }

}