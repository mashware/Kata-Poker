<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/04/18
 * Time: 12:31
 */
namespace Kata\Infrastructure\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Kata\Application\CheckCardCommand\CheckCardCommand;
use Kata\Application\CheckRound\CheckRound;
use Kata\Application\CheckRound\CheckRoundCommand as CheckRoundCommandApplication;

class CheckRoundCommand extends Command
{
    private $checkRound;

    public function __construct(CheckRound $checkRound)
    {
        $this->checkRound = $checkRound;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('round:comprobarMano')
            ->setDescription('Comprobar una mano')
            ->setHelp('Este comando comprueba la mano de un jugador')
            ->addArgument(
                'primeraCartaNumero',
                InputArgument::REQUIRED,
                'Numero de la primera carta'
            )
            ->addArgument(
                'primeraCartaPalo',
                InputArgument::REQUIRED,
                'Palo de la primera carta'
            )
            ->addArgument(
                'segundaCartaNumero',
                InputArgument::REQUIRED,
                'Numero de la segunda carta'
            )
            ->addArgument(
                'segundaCartaPalo',
                InputArgument::REQUIRED,
                'Palo de la segunda carta'
            )
            ->addArgument(
                'terceraCartaNumero',
                InputArgument::REQUIRED,
                'Numero de la tercera carta'
            )
            ->addArgument(
                'terceraCartaPalo',
                InputArgument::REQUIRED,
                'Palo de la tercera carta'
            )
            ->addArgument(
                'cuartaCartaNumero',
                InputArgument::REQUIRED,
                'Numero de la cuarta carta'
            )
            ->addArgument(
                'cuartaCartaPalo',
                InputArgument::REQUIRED,
                'Palo de la cuarta carta'
            )
            ->addArgument(
                'quintaCartaNumero',
                InputArgument::REQUIRED,
                'Numero de la quinta carta'
            )
            ->addArgument(
                'quintaCartaPalo',
                InputArgument::REQUIRED,
                'Palo de la quinta carta'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $result = $this->checkRound->execute(
            new CheckRoundCommandApplication(
                [
                    new CheckCardCommand($input->getArgument('quintaCartaPalo'),
                        $input->getArgument('quintaCartaNumero')),
                    new CheckCardCommand($input->getArgument('cuartaCartaPalo'),
                        $input->getArgument('cuartaCartaNumero')),
                    new CheckCardCommand($input->getArgument('terceraCartaPalo'),
                        $input->getArgument('terceraCartaNumero')),
                    new CheckCardCommand($input->getArgument('segundaCartaPalo'),
                        $input->getArgument('segundaCartaNumero')),
                    new CheckCardCommand($input->getArgument('primeraCartaPalo'),
                        $input->getArgument('primeraCartaNumero'))
                ]
            )
        );

        $output->write('<comment>Tu combinacion es: </comment>');
        $output->writeln("<info>$result</info>");
    }
}