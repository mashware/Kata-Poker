<?php
namespace Kata\Domain\Model\Hand;

class TypesHand
{
    const TYPE_POKER = 'poker';
    const TYPE_LADDER = 'escalera';
    const TYPE_LADDER_ROYAL = 'escalera-real';
    const TYPE_LADDER_COLOR = 'escalera-color';
    const TYPE_COLOR = 'color';
    const TYPE_PAIR = 'pareja';
    const TYPE_DOUBLE_PAIR = 'dobles-parejas';
    const TYPE_THREE_OF_A_KIND = 'trio';
    const TYPE_FULL = 'full';
    const TYPE_NOTHING = 'nada';
}
