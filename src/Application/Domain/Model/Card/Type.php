<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:42
 */

namespace Kata\Application\Domain\Model\Card\Service;


class TypeCard
{
    const SPADES = 'picas';
    const DIAMOND = 'diamantes';
    const CLOVER = 'trebol';
    const HEART = 'corazones';

    public static function isType($type)
    {
    $oClass = new \ReflectionClass(__CLASS__);

    return in_array($type, $oClass->getConstants());
    }
}

