<?php
namespace Kata\Application\CheckRound;

use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Hand\Hand;
use Kata\Infrastructure\Domain\Model\CheckRound\CheckRoundCombination;

class CheckRound
{
    private $checkRoundCombination;

    public function __construct(CheckRoundCombination $checkRoundCombination)
    {
        $this->checkRoundCombination = $checkRoundCombination;
    }

    public function execute(CheckRoundCommand $checkRoundCommand): string
    {
        $cards = $checkRoundCommand->getHand();
        $hand = new Hand(
            [
                new Card($cards[0]->getType(), $cards[0]->getIdentifier()),
                new Card($cards[1]->getType(), $cards[1]->getIdentifier()),
                new Card($cards[2]->getType(), $cards[2]->getIdentifier()),
                new Card($cards[3]->getType(), $cards[3]->getIdentifier()),
                new Card($cards[4]->getType(), $cards[4]->getIdentifier())
            ]
        );

        return $this->checkRoundCombination->checkHand($hand);
    }
}
