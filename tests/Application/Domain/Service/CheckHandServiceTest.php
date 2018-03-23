<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 10:00
 */

namespace Kata\Tests\Application\CheckRound;

use Kata\Domain\Service\CheckHandService;
use Mockery\Matcher\Type;
use PHPUnit\Framework\TestCase;

class CheckHandServiceTest extends TestCase
{
    /**
     * @test
     */

    public function given_nothing_then_new_instance_check_a()
    {
        new CheckHandService();
    }
    /**
     * @test
     */
    public function given_checkhand_Service()
    {
        (new CheckHandService())->execute(
            new hand(
               [
                   new Card (\TypeCard::CLOVER,1),
                   new Card (\TypeCard::CLOVER,1),
                   new Card (\TypeCard::CLOVER,1),
                   new Card (\TypeCard::CLOVER,1),
                   new Card (\TypeCard::CLOVER,1)
               ]
            )
        );
        $this->assertEquals();
    }

}