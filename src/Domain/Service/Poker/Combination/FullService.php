<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 12:02
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;

class FullService implements Combination
{
    public function execute(Hand $hand): bool
    {

        $arrayOfIdentifiers = [];
        foreach ($hand->getHand() as $card) {
            $arrayOfIdentifiers[] = $card->getIdentifier();
        }

        $sameNumberCardCount = array_count_values($arrayOfIdentifiers);
        rsort($sameNumberCardCount);

        return $sameNumberCardCount[0] === 3 && $sameNumberCardCount[1] === 2 ? true : false;
    }
}
