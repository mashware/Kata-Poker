<?php
namespace Kata\Application\CheckRound;

use Assert\Assertion;
use Kata\Application\CheckCardCommand\CheckCardCommand;

class CheckRoundCommand
{
    private $cards;

    /**
     * CheckRoundCommand constructor.
     * @param array|CheckCardCommand[] $cards
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(array $cards)
    {
        Assertion::isArray($cards);
        Assertion::count($cards, 5);
        Assertion::allIsInstanceOf($cards, CheckCardCommand::class);

        $this->cards = $cards;
    }

    /**
     * @return array
     */
    public function getHand(): array
    {
        return $this->cards;
    }
}
