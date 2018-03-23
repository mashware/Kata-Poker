<?php
namespace Kata\Application\CheckRound;


use Assert\Assert;
use Assert\Assertion;
use Kata\Domain\Card\Card;

class CheckRoundCommand
{
    private $hand;

    /**
     * CheckRoundCommand constructor.
     * @param array|Card[] $hand
     * @throws \Assert\AssertionFailedException
     */
//    public function __construct(array $hand)
//    {
//        Assertion::isArray($hand);
//        Assertion::count($hand, 5);
//        Assert::that($hand)->isInstanceOf(Card::class);
//
//        $this->hand = $hand;
//    }

    /**
     * @return array
     */
    public function getHand(): array
    {
        return $this->hand;
    }
}
