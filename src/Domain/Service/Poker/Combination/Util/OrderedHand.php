<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 26/03/2018
 * Time: 10:09
 */

namespace Kata\Domain\Service\Poker\Combination\Util;

use Kata\Domain\Model\Hand\Hand;

class OrderedHand
{
    /**
     * @param Hand $hand
     * @return bool
     */
    public function execute(Hand $hand): array
    {

        $orderingArray=[];
        foreach ($hand->getHand() as $key => $card) {
            $orderingArray[$key] = $card->getIdentifier();
        }
         rsort($orderingArray);

        return $orderingArray;
    }
}