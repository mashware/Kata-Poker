<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Console\Application;

use Kata\Infrastructure\Command\CheckRoundCommand;
use Kata\Application\CheckRound\CheckRound;
use Kata\Domain\Service\Poker\CheckHandService;

$application = new Application();

$checkRound = new CheckRoundCommand(
    new CheckRound(new CheckHandService())
);

$application->addCommands([$checkRound]);
$application->run();