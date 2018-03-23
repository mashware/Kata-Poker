<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 10:28
 */

class Hand
{

    private $hand;

    /**
     * Hand constructor.
     * @param $hand
     */
    public function __construct(array $card)
    {
        \Assert\Assertion::isArray($card);
        \Assert\Assertion::count();

        Assert::that($card)
            ->all()
            ->isInstanceOf( Card::class);
        $this->hand = $card;
    }

    /**
     * @return mixed
     */
    public function getHand()
    {
        return $this->hand;
    }


}