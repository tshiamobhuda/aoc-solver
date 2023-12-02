<?php

namespace App\UI;

use App\Core\Application\SolveChallengeService;
use App\Core\Domain\Solver;
use App\Core\Infrastructure\Repository\SimplePuzzleInputRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:puzzle:solve')]
class PuzzleSolverCommand extends Command
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->addArgument('day', InputArgument::REQUIRED, 'AOC day')
            ->addArgument('part', InputArgument::OPTIONAL, 'AOC puzzle part', 'a')
            ->addOption('dry-run', '-d', InputOption::VALUE_NONE, 'Use puzzle test input');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        try {
            $repo = new SimplePuzzleInputRepository();
            $solver = new Solver();
            $service = new SolveChallengeService($repo, $solver);

            $result = $service->execute(
                (int) $input->getArgument('day'),
                $input->getArgument('part'),
                $input->getOption('dry-run'),
            );

            $io->section('Results:');
            $io->text($result->value());

            return Command::SUCCESS;
        } catch (\Exception $exception) {
            $io->error(['File: ' . $exception->getFile(), 'Line: ' . $exception->getLine(), 'Message: ' . $exception->getMessage(),]);

            return Command::FAILURE;
        }
    }
}
