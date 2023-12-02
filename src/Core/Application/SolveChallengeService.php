<?php

namespace App\Core\Application;

use App\Core\Domain\Puzzle;
use App\Core\Domain\PuzzleInputRepositoryInterface;
use App\Core\Domain\Solver;

class SolveChallengeService
{
    public function __construct(
        private PuzzleInputRepositoryInterface $inputRepository,
        private Solver $solver,
    ) {}

    public function execute(int $day, string $part, bool $useTestData): Answer
    {
        //build data
        $puzzle = new Puzzle($day, $part, $useTestData);
        $input = $this->inputRepository->byPuzzle($puzzle);

        //execute port to solve part
        $solution = $this->solver->solve($input, $puzzle);

        //return solution dto
        return new Answer($solution);
    }
}
