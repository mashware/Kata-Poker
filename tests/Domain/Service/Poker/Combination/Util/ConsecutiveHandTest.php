<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 26/03/2018
 * Time: 15:16
 */

namespace Kata\Tests\Domain\Service\Poker\Combination\Util;


use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\ConsecutiveHand;
use Kata\Domain\Service\Poker\Combination\Util\OrderedHand;
use PHPUnit\Framework\TestCase;

class ConsecutiveHandTest extends TestCase
{
    private $mockOrderedHand;
    public function setUp()
    {
        parent::setUp();
        $this->mockOrderedHand = $this->getMockBuilder(OrderedHand::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @test
     */
    public function given_nothing_when_create_instance_then_success()
    {
        new ConsecutiveHand($this->mockOrderedHand);
    }

    /**
     * @test
     */
    public function given_a_consecutive_hand_when_execute_then_return_consecutive_is_true()
    {
        $return = (new ConsecutiveHand(new OrderedHand()))->execute(
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
        $this->assertTrue($return);
    }

    /**
     * @test
     *
     */
    public function given_a_hand_when_execute_then_return_consecutive_is_False()
    {
        $return = (new ConsecutiveHand(new OrderedHand()))->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 9),
                    new Card(TypeCard::CLOVER, 5),
                    new Card(TypeCard::CLOVER, 6)
                ]
            )
        );
        $this->assertFalse($return);
    }

}