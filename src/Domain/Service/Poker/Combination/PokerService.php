<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 23/03/18
 * Time: 13:15
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\CardGetCountRepeatIdentifier;

class PokerService implements Combination
{
    const COUNT_MIN_IDENTIFIER = 4;

    public function execute(Hand $hand): bool
    {
        $count_repeat_identifiers =
            (new CardGetCountRepeatIdentifier())
                ->execute($hand, self::COUNT_MIN_IDENTIFIER);

        return $count_repeat_identifiers === 1;
    }

    public function getType(): string
    {
        return TypeHand::TYPE_POKER;
    }
}