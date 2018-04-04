<?php
namespace Kata\Domain\Service\Poker;


use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypesHand;
use Kata\Domain\Service\Poker\Combination\Combination;

class CheckHandService
{
    private $pokerService;
    private $ColorService;
    private $DoublePairService;
    private $FullService;
    private $LadderColorService;
    private $LadderRoyalService;
    private $LadderService;
    private $PairService;
    private $ThreeOfAKindService;

    public function __construct(
        Combination $pokerService,
        Combination $ColorService,
        Combination $DoublePairService,
        Combination $FullService,
        Combination $LadderColorService,
        Combination $LadderRoyalService,
        Combination $LadderService,
        Combination $PairService,
        Combination $ThreeOfAKindService
    ) {
        $this->pokerService = $pokerService;
        $this->ColorService = $ColorService;
        $this->DoublePairService = $DoublePairService;
        $this->FullService = $FullService;
        $this->LadderColorService = $LadderColorService;
        $this->LadderRoyalService = $LadderRoyalService;
        $this->LadderService = $LadderService;
        $this->PairService = $PairService;
        $this->ThreeOfAKindService = $ThreeOfAKindService;
    }


    public function execute(Hand $hand): bool
    {
        if ($this->LadderRoyalService->execute($hand)) {
            return TypesHand::TYPE_LADDER_ROYAL;
        } elseif ($this->LadderColorService->execute($hand)) {
            return TypesHand::TYPE_LADDER_COLOR;
        } elseif ($this->pokerService->execute($hand)) {
            return TypesHand::TYPE_POKER;
        } elseif ($this->FullService->execute($hand)) {
            return TypesHand::TYPE_FULL;
        } elseif ($this->ColorService->execute($hand)) {
            return TypesHand::TYPE_COLOR;
        } elseif ($this->LadderService->execute($hand)) {
            return TypesHand::TYPE_LADDER;
        } elseif ($this->ThreeOfAKindService->execute($hand)) {
            return TypesHand::TYPE_THREE_OF_A_KIND;
        } elseif ($this->DoublePairService->execute($hand)) {
            return TypesHand::TYPE_DOUBLE_PAIR;
        } elseif ($this->PairService->execute($hand)) {
            return TypesHand::TYPE_PAIR;
        } else {
            return TypesHand::TYPE_NOTHING;
        }
    }
}
