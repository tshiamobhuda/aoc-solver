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

namespace App\Core\Domain;

interface PuzzleInputRepositoryInterface
{
    /**
     * Returns the puzzle input
     *
     * Attempts to read the puzzle input from the text file
     *
     * @param Puzzle $puzzle Domain model/aggregate
     *
     * @return PuzzleInput
     *
     * @throws PuzzleException
     */
    public function byPuzzle(Puzzle $puzzle): PuzzleInput;
}
