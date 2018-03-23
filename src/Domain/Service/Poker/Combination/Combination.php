<?php
namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;

interface Combination
{
    public function execute(Hand $hand): bool;
}