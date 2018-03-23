<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:39
 */

class Card
{
    private $number;
    private $type;

    /**
     * Card constructor.
     * @param $number
     * @param $type
     */
    public function __construct(String $number,int $type)
    {
        \Assert\Assertion::string();
        \Assert\Assertion::integer();
        \Assert\Assertion::allChoice($type, get_class_vars(new TypeCard()));
        $this->number = $number;
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getNumber() : Number
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getType() : String
    {
        return $this->type;
    }



}