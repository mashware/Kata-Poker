<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:25
 */

namespace Kata\Application\CheckRound;


use Assert\Assert;
use Assert\Assertion;

class CheckRoundCommand
{
    private $hand;

    /**
     * CheckRoundCommand constructor.
     * @param array $hand
     */
    public function __construct($hand)
    {

        $this->hand = $hand;
    }

    /**
     * @return array
     */
    public function getHand()
    {
        return $this->hand;
    }



}