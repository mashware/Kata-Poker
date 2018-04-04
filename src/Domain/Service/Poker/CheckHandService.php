<?php
namespace Kata\Domain\Service\Poker;


use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypesHand;
use Kata\Domain\Service\Poker\Combination\Combination;

class CheckHandService
{
    private $pokerService;
    private $colorService;
    private $doublePairService;
    private $fullService;
    private $ladderColorService;
    private $ladderRoyalService;
    private $ladderService;
    private $pairService;
    private $threeOfAKindService;

    public function __construct(
        Combination $pokerService,
        Combination $colorService,
        Combination $doublePairService,
        Combination $fullService,
        Combination $ladderColorService,
        Combination $ladderRoyalService,
        Combination $ladderService,
        Combination $pairService,
        Combination $threeOfAKindService
    ) {
        $this->pokerService = $pokerService;
        $this->colorService = $colorService;
        $this->doublePairService = $doublePairService;
        $this->fullService = $fullService;
        $this->ladderColorService = $ladderColorService;
        $this->ladderRoyalService = $ladderRoyalService;
        $this->ladderService = $ladderService;
        $this->pairService = $pairService;
        $this->threeOfAKindService = $threeOfAKindService;
    }


    public function execute(Hand $hand): string
    {
        if ($this->ladderRoyalService->execute($hand)) {
            return TypesHand::TYPE_LADDER_ROYAL;
        } elseif ($this->ladderColorService->execute($hand)) {
            return TypesHand::TYPE_LADDER_COLOR;
        } elseif ($this->pokerService->execute($hand)) {
            return TypesHand::TYPE_POKER;
        } elseif ($this->fullService->execute($hand)) {
            return TypesHand::TYPE_FULL;
        } elseif ($this->colorService->execute($hand)) {
            return TypesHand::TYPE_COLOR;
        } elseif ($this->ladderService->execute($hand)) {
            return TypesHand::TYPE_LADDER;
        } elseif ($this->threeOfAKindService->execute($hand)) {
            return TypesHand::TYPE_THREE_OF_A_KIND;
        } elseif ($this->doublePairService->execute($hand)) {
            return TypesHand::TYPE_DOUBLE_PAIR;
        } elseif ($this->pairService->execute($hand)) {
            return TypesHand::TYPE_PAIR;
        } else {
            return TypesHand::TYPE_NOTHING;
        }
    }
}
