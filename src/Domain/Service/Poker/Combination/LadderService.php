<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 11:36
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\CardSequenceOrder;

class LadderService extends Combination
{
    public function execute(Hand $hand): bool
    {
        return (new CardSequenceOrder())
            ->execute($hand);
    }

    public function getType(): string
    {
        return TypeHand::TYPE_LADDER;
    }
}