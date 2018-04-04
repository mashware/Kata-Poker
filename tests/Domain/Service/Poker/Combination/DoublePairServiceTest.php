<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 10:50
 */

namespace Kata\Tests\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\DoublePairService;
use PHPUnit\Framework\TestCase;

class DoublePairServiceTest extends TestCase
{
    /**
     * @test
     */
    public function given_nothing_when_new_instance__double_pair_service_then_success()
    {
        new DoublePairService();
    }

    /**
     * @test
     */
    public function given_nothing_when_new_instance_double_pair_service_then_instance_combination()
    {
        $this->assertInstanceOf(Combination::class, new DoublePairService());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_double_pair_service_when_execute_then_success()
    {
        (new DoublePairService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1)
                ]
            )
        );
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_a_double_pair_hand_when_execute_then_return_true()
    {
        $return = (new DoublePairService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 5)
                ]
            )
        );

        $this->assertTrue($return);
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_a_non_double_pair_hand_when_execute_then_return_true()
    {
        $return = (new DoublePairService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 6),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 5)
                ]
            )
        );

        $this->assertFalse($return);
    }
}
