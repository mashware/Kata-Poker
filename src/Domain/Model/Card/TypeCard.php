<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:40
 */

class TypeCard
{
    const SPADES = "picas";
    const CLOVER = "trevol";
    const HEART = "corazon";
    const DIAMOND = "diamante";

    public  static function isType(string $type ){
        $oClass = new \ReflectionClass(__CLASS__);
        return in_array($type, $oClass->getConstants());
    }
}