<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 10:12
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;

class PairService implements Combination
{
    public function execute(Hand $hand): bool
    {
        $sameNumberCard = [];
        foreach ($hand->getHand() as $card) {
            $sameNumberCard[$card->getIdentifier()] = $card->getIdentifier();
        }

        return count($sameNumberCard) === 4 ? true : false;
    }
}