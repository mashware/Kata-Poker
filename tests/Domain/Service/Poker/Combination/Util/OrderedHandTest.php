<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 26/03/2018
 * Time: 10:09
 */

namespace Kata\Tests\Domain\Service\Poker\Combination\Util;

use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\OrderedHand;
use PHPUnit\Framework\TestCase;

class OrderedHandTest extends TestCase
{
    /**
     * @test
     */
    public function given_nothing_when_create_instance_then_success()
    {
        new OrderedHand();
    }

    /**
     * @test
     */
    public function given_instance_when_execute_then_success()
    {
        (new OrderedHand())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 4),
                    new Card(TypeCard::CLOVER, 5),
                    new Card(TypeCard::CLOVER, 6)
                ]
            )
        );
    }

    /**
     * @test
     */
    public function given_instance_when_execute_then_array_given_becomes_ordered()
    {
        $return=(new OrderedHand())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 4),
                    new Card(TypeCard::CLOVER, 5),
                    new Card(TypeCard::CLOVER, 6)
                ]
            )
        );
        $checkOrdenMayorAMenor =0;
        $numComprobacionesPositivasNecesarias=4;

        for ($i=0; $i<count($return)-1; $i++) {
            if ($return[$i] >= $return[$i+1]) {
                $checkOrdenMayorAMenor++;
            }
        }

        $this->assertTrue($checkOrdenMayorAMenor===$numComprobacionesPositivasNecesarias);
    }
}