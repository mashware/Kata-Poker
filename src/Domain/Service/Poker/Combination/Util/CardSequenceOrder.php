<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 11:45
 */

namespace Kata\Domain\Service\Poker\Combination\Util;

use Kata\Domain\Model\Hand\Hand;

class CardSequenceOrder
{
    public function execute(Hand $hand): bool
    {
        $identifiers = array();

        foreach ($hand->getHand() as $card) {
            $identifiers[] = $card->getIdentifier();
        }

        sort($identifiers);

        $identifier_initial = $identifiers[0];
        foreach($identifiers as $identifier){
            if($identifier !== $identifier_initial){
                return false;
            }

            $identifier_initial += 1;
        }

        return true;
    }
}