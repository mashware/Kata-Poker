<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 11:27
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;

class ColorService extends Combination
{
    public function execute(Hand $hand): bool
    {
        return (new AllCardHaveTheSameColors())
            ->execute($hand);
    }

    public function getType(): string
    {
        return TypeHand::TYPE_COLOR;
    }
}