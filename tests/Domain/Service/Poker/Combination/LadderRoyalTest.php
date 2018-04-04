<?php

namespace Kata\Tests\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\LadderRoyalService;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;
use Kata\Domain\Service\Poker\Combination\Util\ConsecutiveHand;
use Kata\Domain\Service\Poker\Combination\Util\OrderedHand;
use PHPUnit\Framework\TestCase;

class LadderRoyalTest extends TestCase
{
    private $mockAllCardHaveTheSameColors;
    private $mockConsecutiveHand;

    public function setUp()
    {
        parent::setUp();
        $this->mockAllCardHaveTheSameColors = $this->getMockBuilder(AllCardHaveTheSameColors::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->mockConsecutiveHand = $this->getMockBuilder(ConsecutiveHand::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

    }
    /**
     * @test
     */
    public function given_nothing_when_new_instance_ladder_royal_service_then_success()
    {
        new LadderRoyalService($this->mockAllCardHaveTheSameColors, $this->mockConsecutiveHand);
    }

    /**
     * @test
     */
    public function given_nothing_when_new_instance_ladder_royal_service_then_instance_combination()
    {
        $this->assertInstanceOf(
            Combination::class,
            new LadderRoyalService(
                $this->mockAllCardHaveTheSameColors,
                $this->mockConsecutiveHand
            )
        );
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_service_when_execute_then_success()
    {
        (new LadderRoyalService($this->mockAllCardHaveTheSameColors, $this->mockConsecutiveHand))->execute(
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
    public function given_hand_with_ace_when_execute_then_return_false()
    {
        $return = (new LadderRoyalService(
            new AllCardHaveTheSameColors(),
            new ConsecutiveHand(new OrderedHand())
        )
        )->execute(
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

        $this->assertFalse($return);
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_hand_with_not_ace_when_execute_then_return_false()
    {
        $return = (new LadderRoyalService(
            new AllCardHaveTheSameColors(),
            new ConsecutiveHand(new OrderedHand())
        )
        )->execute(
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
    public function given_royal_ladder_hand_when_execute_then_return_true()
    {
        $return = (new LadderRoyalService(
            new AllCardHaveTheSameColors(),
            new ConsecutiveHand(new OrderedHand())
        )
        )->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 4),
                    new Card(TypeCard::CLOVER, 5)
                ]
            )
        );

        $this->assertTrue($return);
    }
}