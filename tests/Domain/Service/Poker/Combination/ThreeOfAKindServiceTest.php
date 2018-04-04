<?php
/**
 * Created by PhpStorm.
 * User: Fran Moraton
 * Date: 27/03/2018
 * Time: 12:47
 */

namespace Kata\Tests\Domain\Service\Poker\Combination;

use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Service\Poker\Combination\Combination;
use Kata\Domain\Service\Poker\Combination\ThreeOfAKindService;
use PHPUnit\Framework\TestCase;

class ThreeOfAKindServiceTest extends TestCase
{

    /**
     * @test
     */
    public function given_nothing_when_new_instance_of_three_of_a_kind_service_then_success()
    {
        new ThreeOfAKindService();
    }

    /**
     * @test
     */
    public function given_nothing_when_new_instance_of_three_of_a_kind_service_then_instance_combination()
    {
        $this->assertInstanceOf(Combination::class, new ThreeOfAKindService());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function given_three_of_a_kind_service_when_execute_then_success()
    {
        (new ThreeOfAKindService())->execute(
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
}