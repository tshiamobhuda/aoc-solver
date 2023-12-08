<?php

declare(strict_types=1);

/*
 * This file is part of tshiamobhuda/aoc-php-solver.
 *
 * (c) Tshaimo Bhuda <tshiamobhuda@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

    /**
     * Attempts to solve the Advent of Code challenge.
     *
     * @param int $day The day (numeric) of the challenge
     * @param string $part The part of the challenge (either `a` or `b`)
     * @param bool $useTestData Wether to use test input or not
     *
     * @return Answer
     */
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
