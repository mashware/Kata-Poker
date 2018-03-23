<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:18
 */

namespace Kata\Application\CheckRound;


use Assert\Assert;
use Assert\Assertion;

class CheckRoundCommand
{
    private $hand;

    /**
     * CheckRoundCommand constructor.
     * @param $hand
     * @throws /
     */
    public function __construct(array $hand)
    {
        Assertion::isArray($hand);
        Assertion::count($hand,5);
        Assert::that($hand)->isInstanceOf( Card::class);
        $this->hand = $hand;
    }


    /**
     * @return mixed
     */
    public function getHand()
    {
        return $this->hand;
    }


}