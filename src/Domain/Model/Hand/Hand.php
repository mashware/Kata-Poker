<?php

namespace Kata\Domain\Model\Hand;

use Assert\Assert;
use Assert\Assertion;
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
        Assertion::isArray($cards);
        Assertion::count($cards, 5);
        Assert::that($cards)
            ->all()
            ->isInstanceOf(Card::class)
        ;

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
