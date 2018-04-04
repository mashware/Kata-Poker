<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 9:44
 */

namespace Kata\Tests\Domain\Service\Poker\Combination;



use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\ColorService;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\Util\AllCardHaveTheSameColors;
use PHPUnit\Framework\TestCase;

class ColorServiceTest extends TestCase
{
    private $mockAllCardHaveTheSameColor;

    public function setUp()
    {
        parent::setUp();
        $this->mockAllCardHaveTheSameColor = $this->getMockBuilder(AllCardHaveTheSameColors::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @test
     */
    public function given_nothing_when_new_instance_color_service_then_success()
    {
        new ColorService($this->mockAllCardHaveTheSameColor);
    }
    /**
     * @test
     */
    public function given_nothing_when_new_instance_ladder_service_then_instance_combination()
    {
        $this->assertInstanceOf(
            Combination::class,
            new ColorService(
                $this->mockAllCardHaveTheSameColor
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
        (new ColorService($this->mockAllCardHaveTheSameColor))->execute(
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
    public function given_a_color_hand_when_execute_then_return_true()
    {
        $return = (new ColorService(new AllCardHaveTheSameColors()))->execute(
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
    public function given_a_non_color_hand_when_execute_then_return_false()
    {
        $return = (new ColorService(new AllCardHaveTheSameColors()))->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::HEART, 1)
                ]
            )
        );
        $this->assertFalse($return);
    }
}
