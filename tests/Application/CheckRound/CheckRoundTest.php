<?php
namespace Kata\Tests\Application\CheckRound;

use Kata\Application\CheckRound\CheckRound;
use Kata\Application\CheckRound\CheckRoundCommand;

class CheckRoundTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function ckeckInstance()
    {
        new CheckRound();
    }

    /**
     * @test
     */
    public function given_check_round_object_then_execute_when_success()
    {
        (new CheckRound())->execute(new CheckRoundCommand());
    }
}
