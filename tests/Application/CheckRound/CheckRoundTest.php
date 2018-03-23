<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:03
 */

namespace Kata\Tests\Application\CheckRound;


use Kata\Application\CheckRound\CheckRound;

use Kata\Application\CheckRound\CheckRoundCommand;
use PHPUnit\Framework\TestCase;

class CheckRoundTest extends TestCase
{
    /**
     * @test
     */
    public function checkInstance()
    {
        new CheckRound();
    }

    /**
     * @test
     */
    public function given_check_round_object_then_execute_when_success()
    {
        //Al instanciar la clase dentro de () evitamos la necesidad de guardarlo en una variable
        (new CheckRound())->execute(new CheckRoundCommand());
    }


}