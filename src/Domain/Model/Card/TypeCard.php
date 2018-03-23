<?php
namespace Kata\Domain\Model\Card;

class TypeCard
{
    const SPADES = 'picas';
    const CLOVER = 'trebol';
    const HEART = 'corazones';
    const DIAMOND = 'diamantes';

    /**
     * @param string $type
     * @return bool
     * @throws \ReflectionException
     */
    public static function isType(string $type)
    {
        $oClass = new \ReflectionClass(__CLASS__);

        return in_array($type, $oClass->getConstants());
    }
}