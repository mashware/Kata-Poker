<?php
namespace Kata\Tests\Domain\Service\Poker\Combination\Util;

use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Util\CheckCardHaveTheSameColorsService;
use PHPUnit\Framework\TestCase;

class AllCardHaveTheSameColorsTest extends TestCase
{
    /**
     * @test
     */
    public function given_nothing_when_create_instance_then_success()
    {
        new CheckCardHaveTheSameColorsService();
    }

    /**
     * @test
     */
    public function given_instance_when_execute_then_success()
    {
        (new CheckCardHaveTheSameColorsService())->execute(
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
    }


    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_hand_when_colors_distinct_then_false()
    {
        $return = (new CheckCardHaveTheSameColorsService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::DIAMOND, 2),
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
    public function given_hand_when_all_colors_equals_then_true()
    {
        $return = (new CheckCardHaveTheSameColorsService())->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 2),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 7),
                    new Card(TypeCard::CLOVER, 8)
                ]
            )
        );

        $this->assertTrue($return);
    }
}