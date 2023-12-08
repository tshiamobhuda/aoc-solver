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

interface SolutionInterface
{
    /**
     * Returns the answer to the first part of the challenge
     *
     * @param PuzzleInput $input The puzzle input
     *
     * @return string The answer
     */
    public function partA(PuzzleInput $input): string;

    /**
     * Returns the answer to the second part of the challenge
     *
     * @param PuzzleInput $input The puzzle input
     *
     * @return string The answer
     */
    public function partB(PuzzleInput $input): string;
}
