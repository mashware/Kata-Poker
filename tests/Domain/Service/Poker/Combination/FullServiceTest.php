<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 12:00
 */

namespace Kata\Tests\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\FullService;
use PHPUnit\Framework\TestCase;

class FullServiceTest extends TestCase
{

    /**
     * @test
     */
    public function given_nothing_when_new_instance__full_service_then_success()
    {
        new FullService();
    }

    /**
     * @test
     */
    public function given_nothing_when_new_instance_full_service_then_instance_combination()
    {
        $this->assertInstanceOf(Combination::class, new FullService());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_full_service_when_execute_then_success()
    {
        (new FullService())->execute(
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
    public function given_a_full_hand_when_execute_then_return_true()
    {
        $return = (new FullService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 1)
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
    public function given_a_non_full_pair_hand_when_execute_then_return_true()
    {
        $return = (new FullService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 5)
                ]
            )
        );

        $this->assertFalse($return);
    }
}
