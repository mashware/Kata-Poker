<?php

namespace Kata\Tests\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\LadderRoyalService;
use PHPUnit\Framework\TestCase;

class LadderRoyalTest extends TestCase
{
    /**
     * @test
     */
    public function given_nothing_when_new_instance_ladder_royal_service_then_success()
    {
        new LadderRoyalService();
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_service_when_execute_then_success()
    {
        (new LadderRoyalService())->execute(
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
    public function given_hand_with_ace_when_execute_then_return_true()
    {
        $return = (new LadderRoyalService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2)
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
    public function given_hand_with_not_ace_when_execute_then_return_false()
    {
        $return = (new LadderRoyalService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2)
                ]
            )
        );

        $this->assertFalse($return);
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_winner_hand_when_execute_then_return_true()
    {
        $return = (new LadderRoyalService())->execute(
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

        $this->assertTrue($return);
    }
}