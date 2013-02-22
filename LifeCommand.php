<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Life\Game;

class LifeCommand extends Command
{
    protected function configure()
    {
        $this->setName('generate')
            ->setDescription('Generate a single iteration of Conway\'s Life game')
            ->addOption(
                'file',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Source filename for the grid'
            )
            ->addOption(
                'width',
                'x',
                InputOption::VALUE_OPTIONAL,
                'Width of the grid for random generation'
            )
            ->addOption(
                'height',
                'y',
                InputOption::VALUE_OPTIONAL,
                'Height of the grid for random generation'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $game = new Game();
        try {
            if ($file = $input->getOption('file')) {
                $game->newGame(array('file' => $file));
            } else if (($width = $input->getOption('width')) && ($height = $input->getOption('height'))) {
                $game->newGame(
                    array(
                        'width'  => (int) $width,
                        'height' => (int) $height
                    )
                );
            } else {
                $output->writeln('<fg=red>You must supply either a file or a valid width and height</fg=red>');
                return;
            }
                
            $game->takeTurn();

            $output->writeln($game->getBoard()->toString());

        } catch (Exception $exception) {
            $output->writeln('<fg=red>' . $exception->getMessage() . '</fg=red>');
        }

    }

}
