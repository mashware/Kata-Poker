<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 9:48
 */

namespace Kata\Domain\Service\Poker\Combination\Util;

use Kata\Domain\Model\Hand\Hand;

class CardGetCountRepeatIdentifier
{
    public function execute(Hand $hand, int $count_min_identifier): int
    {
        $identifiers = array();

        foreach ($hand->getHand() as $card) {
            $identifiers[] = $card->getIdentifier();
        }

        $count_repeat_identifiers = 0;
        $count_identifiers = array_count_values($identifiers);

        foreach($count_identifiers as $count_identifier){
            if($count_identifier === $count_min_identifier){
                $count_repeat_identifiers += 1;
            }
        }

        return $count_repeat_identifiers;
    }
}