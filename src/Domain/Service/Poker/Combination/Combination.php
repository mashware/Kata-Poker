<?php
namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;

abstract class Combination
{
    private $combination;

    public function nextCombination(Combination $combination)
    {
        $this->combination = $combination;
    }

    public function handle(Hand $hand): ?string
    {
        $processed = $this->execute($hand);
        $type = null;

        switch (true) {
            case $processed:
                $type = $this->getType();
                break;
            case false === $processed && null !== $this->combination:
                $type = $this->combination->handle($hand);
        }

        return $type;
    }
    abstract public function execute(Hand $hand): bool;
    abstract public function getType(): string;
}