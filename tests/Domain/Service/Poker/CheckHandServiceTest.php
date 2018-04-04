<?php
namespace Kata\Tests\Domain\Service\Poker;

use Kata\Domain\Service\Poker\Combination\PokerService;
use PHPUnit\Framework\TestCase;
use Kata\Domain\Model\Card\Card;
use Kata\Domain\Model\Hand\Hand;
use Kata\Domain\Model\Card\TypeCard;
use Kata\Domain\Service\Poker\CheckHandService;

class CheckHandServiceTest extends TestCase
{
    private $mockPokerService;
    public function setUp()
    {
        parent::setUp();
        $this->mockPokerService = $this->getMockBuilder(PokerService::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }
    /**
     * @test
     */
    public function given_nothing_then_new_instance_check_hand_service_then_success()
    {
        new CheckHandService($this->mockPokerService);
    }

    /**
     * @test
     */
    public function given_check_hand_service_then_execute_then_success()
    {
        (new CheckHandService($this->mockPokerService))->execute(
            new Hand(
                [
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 1),
                    new Card(TypeCard::CLOVER, 3),
                    new Card(TypeCard::CLOVER, 4)
                ]
            )
        );
    }

}
