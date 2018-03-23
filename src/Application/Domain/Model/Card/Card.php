<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:40
 */

namespace Kata\Application\Domain\Model\Card\Service;


use Assert\Assertion;

class Card
{

    private $type;
    private $number;

    /**
     * Card constructor.
     * @param $number
     */
    public function __construct(int $number, String $type)
    {
        Assertion::string($type);
        Assertion::integer($number);

        $this->number = $number;
        $this->type = $type;
    }


}