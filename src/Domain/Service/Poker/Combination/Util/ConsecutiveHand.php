<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 26/03/2018
 * Time: 15:07
 */

namespace Kata\Domain\Service\Poker\Combination\Util;


use Kata\Domain\Model\Hand\Hand;

class ConsecutiveHand
{
    private $OrderedHand;

    /**
     * ConsecutiveHand constructor.
     * @param $OrderedHand
     */
    public function __construct(OrderedHand $OrderedHand)
    {
        $this->OrderedHand = $OrderedHand;
    }

    public function execute(Hand $hand) :bool
    {
        $orderedArray = $this->OrderedHand->execute($hand);

        return $this->ArrayIsConsecutive($orderedArray);
    }

    /**
     * @param $orderedArray
     * @param $i
     * @return bool
     */
    private function ArrayIsConsecutive($orderedArray): bool
    {
        for ($i = 0; $i < count($orderedArray) - 1; $i++) {
            if ($orderedArray[$i] - $orderedArray[$i + 1] !== 1) {
                return false;
            }
        }

        return true;
    }


}