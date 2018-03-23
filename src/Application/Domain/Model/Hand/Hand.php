<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 10:29
 */

namespace Kata\Aplication\Domain\Model\Hand;


class Hand
{
    private $hand;

    /**
     * Hand constructor.
     * @param array $cards
     */
    public function __construct(array $cards)
    {
        Assertion::isArray($cards);
        Assertion::count($cards, 5);
        Assert::that($cards)->
             all()->
             isInstanceOf( Card::class)
        ;

        $this->hand = $cards;
    }

    /**
     * @return array
     */
    public function getHand(): array
    {
        return $this->hand;
    }



}