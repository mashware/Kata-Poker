<?php

namespace Kata\Domain\Model\Hand;

use Kata\Domain\Model\Card\Card;

class Hand
{
    /**
     * @var array|Card[]
     */
    private $hand;

    /**
     * Hand constructor.
     * @param array|Card[] $cards
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(array $cards)
    {
        $this->hand = $cards;
    }

    /**
     * @return array|Card[]
     */
    public function getHand(): array
    {
        return $this->hand;
    }
}
