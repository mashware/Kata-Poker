<?php
namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;

abstract class Combination
{
    private $combination;

    public function __construct(Combination $combination)
    {
        $this->combination = $combination;
    }

    public function handle(Hand $hand): string
    {
        $processed = $this->execute($hand);

        if (false === $processed) {
            $processed = $this->combination->execute($hand);
        }

        return $processed;
    }
    abstract public function execute(Hand $hand): bool;
    abstract public function getType(): string;
}