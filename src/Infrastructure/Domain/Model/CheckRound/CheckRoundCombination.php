<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 12:57
 */

namespace Kata\Infrastructure\Domain\Model\CheckRound;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\CheckHandService;
use Kata\Domain\Service\Poker\Combination\ColorService;
use Kata\Domain\Service\Poker\Combination\DoublePairService;
use Kata\Domain\Service\Poker\Combination\FullService;
use Kata\Domain\Service\Poker\Combination\LadderColorService;
use Kata\Domain\Service\Poker\Combination\LadderRoyalService;
use Kata\Domain\Service\Poker\Combination\LadderService;
use Kata\Domain\Service\Poker\Combination\OnePairService;
use Kata\Domain\Service\Poker\Combination\PokerService;
use Kata\Domain\Service\Poker\Combination\TrioService;

class CheckRoundCombination
{
    public function checkHand(Hand $hand): string
    {
        $combinations = [new LadderRoyalService(), new LadderColorService(), new PokerService(), new FullService(),
            new ColorService(), new LadderService(), new TrioService(), new DoublePairService(), new OnePairService()];

        foreach($combinations as $combination){
            $resultCombination = (new CheckHandService($combination))
                ->execute($hand);

            if($resultCombination){
                return $combination->getType();
            }
        }

        return "No hay combinacion";
    }
}