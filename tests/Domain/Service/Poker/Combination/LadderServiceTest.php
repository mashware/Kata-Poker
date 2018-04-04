<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 9:20
 */

namespace Kata\Tests\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\LadderService;
use Kata\Domain\Service\Poker\Combination\Util\ConsecutiveHand;
use Kata\Domain\Service\Poker\Combination\Util\OrderedHand;
use PHPUnit\Framework\TestCase;

class LadderServiceTest extends TestCase
{
    private $mockConsecutiveHand;

    public function setUp()
    {
        parent::setUp();
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
        new LadderService($this->mockConsecutiveHand);
    }

    /**
     * @test
     */
    public function given_nothing_when_new_instance_ladder_service_then_instance_combination()
    {
        $this->assertInstanceOf(
            Combination::class,
            new LadderService(
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
        (new LadderService($this->mockConsecutiveHand))->execute(
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
    public function given_a_ladder_hand_when_execute_then_return_true()
    {
        $return = (new LadderService(
            new ConsecutiveHand(new OrderedHand())
        )
        )->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::HEART, 2),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 4),
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
    public function given_a_non_ladder_color_hand_when_execute_then_return_true()
    {
        $return = (new LadderService(
            new ConsecutiveHand(new OrderedHand())
        )
        )->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::HEART, 7),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 4),
                    new Card(TypeCard::CLOVER, 5)
                ]
            )
        );

        $this->assertFalse($return);
    }
}
