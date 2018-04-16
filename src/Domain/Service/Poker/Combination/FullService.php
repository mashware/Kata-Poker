<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 12:01
 */

namespace Kata\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Hand\TypeHand;
use Kata\Domain\Service\Poker\Combination\Util\CardGetCountRepeatIdentifier;

class FullService extends Combination
{
    const COUNT_MIN_IDENTIFIER_FIRST = 3;
    const COUNT_MIN_IDENTIFIER_SECOND = 2;

    public function execute(Hand $hand): bool
    {
        $count_repeat_identifiers_first_value =
            (new CardGetCountRepeatIdentifier())
                ->execute($hand, self::COUNT_MIN_IDENTIFIER_FIRST);
        $count_repeat_identifiers_second_value =
            (new CardGetCountRepeatIdentifier())
                ->execute($hand, self::COUNT_MIN_IDENTIFIER_SECOND);

        return $count_repeat_identifiers_first_value === 1
            && $count_repeat_identifiers_second_value === 1;
    }

    public function getType(): string
    {
        return TypeHand::TYPE_FULL;
    }
}