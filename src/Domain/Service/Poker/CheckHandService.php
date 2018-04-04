<?php
namespace Kata\Domain\Service\Poker;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;

class CheckHandService
{
    private $pokerService;

    public function __construct(Combination $pokerService)
    {
        $this->pokerService = $pokerService;
    }


    public function execute(Hand $hand): bool
    {
        return $this->pokerService->execute($hand);
    }
}
