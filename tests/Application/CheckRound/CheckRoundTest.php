<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/03/18
 * Time: 9:02
 */

namespace Kata\Tests\Application\CheckRound;

use Kata\Application\CheckRound\CheckRound;
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
}