<?php
namespace Kata\Tests\Domain\Service\Poker\Combination;


use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\PokerService;
use PHPUnit\Framework\TestCase;

class PokerServiceTest  extends TestCase
{
    /**
     * @test
     */
    public function given_nothing_when_new_instance_poker_service_then_success()
    {
        new PokerService();
    }

    /**
     * @test
     */
    public function given_nothing_when_new_instance_poker_service_then_instance_combination()
    {
        $this->assertInstanceOf(Combination::class, new PokerService());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_poker_service_when_execute_then_success()
    {
        (new PokerService())->execute(
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
    public function given_good_hand_when_execute_then_return_true()
    {
        $return = (new PokerService())->execute(
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

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_good_hand_four_equals_when_execute_then_return_true()
    {
        $return = (new PokerService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
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
    public function given_good_hand_when_execute_then_return_false()
    {
        $return = (new PokerService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 3)
                ]
            )
        );

        $this->assertFalse($return);
    }
}