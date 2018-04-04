<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 9:38
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\CardGetCountRepeatIdentifier;

class DoublePairService implements Combination
{
    const COUNT_MIN_IDENTIFIER = 2;

    public function execute(Hand $hand): bool
    {
        $count_repeat_identifiers =
            (new CardGetCountRepeatIdentifier())
                ->execute($hand, self::COUNT_MIN_IDENTIFIER);

        return $count_repeat_identifiers === 2;
    }

    public function getType(): string
    {
        return TypeHand::TYPE_DOUBLE_PAIR;
    }
}