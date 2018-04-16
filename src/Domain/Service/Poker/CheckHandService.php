<?php
namespace Kata\Domain\Service\Poker;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\ColorService;
use Kata\Domain\Service\Poker\Combination\DoublePairService;
use Kata\Domain\Service\Poker\Combination\FullService;
use Kata\Domain\Service\Poker\Combination\LadderColorService;
use Kata\Domain\Service\Poker\Combination\LadderRoyalService;
use Kata\Domain\Service\Poker\Combination\LadderService;
use Kata\Domain\Service\Poker\Combination\OnePairService;
use Kata\Domain\Service\Poker\Combination\PokerService;
use Kata\Domain\Service\Poker\Combination\TrioService;

class CheckHandService
{
    /**
     * @var Combination
     */
    private $combination;

    public function __construct()
    {
        $this->combination = new LadderRoyalService();
        $ladderColorService = new LadderColorService();
        $pokerService = new PokerService();
        $fullService = new FullService();
        $colorService = new ColorService();
        $ladderService = new LadderService();
        $trioService = new TrioService();
        $doublePairService = new DoublePairService();
        $onePairService = new OnePairService();

        $this->combination->nextCombination($ladderColorService);
        $ladderColorService->nextCombination($pokerService);
        $pokerService->nextCombination($fullService);
        $fullService->nextCombination($colorService);
        $colorService->nextCombination($ladderService);
        $ladderService->nextCombination($trioService);
        $trioService->nextCombination($doublePairService);
        $doublePairService->nextCombination($onePairService);
    }


    public function execute(Hand $hand): ?string
    {
        return $this->combination->handle($hand);
    }
}
