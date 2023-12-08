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

class Solver
{
    public const PRE_FQCN = 'App\Resource\Solution\Day';

    /**
     * Solves a part of the challenge
     *
     * @param PuzzleInput $input The puzzle input to use
     * @param Puzzle $puzzle The puzzle to solve
     *
     * @return string The solution
     *
     * @throws PuzzleException
     */
    public function solve(PuzzleInput $input, Puzzle $puzzle): string
    {
        //build class FQCN
        $class = self::PRE_FQCN . $puzzle->day();

        try {
            $class = new \ReflectionClass(self::PRE_FQCN . $puzzle->day());

            //instantiate Solution
            /**
             * @var SolutionInterface $instance
             */
            $instance = $class->newInstanceWithoutConstructor();

            //finally solve puzzle
            return match ($puzzle->part()) {
                'a' => $instance->partA($input),
                'b' => $instance->partB($input)
            };
        } catch (\ReflectionException) {
            throw new PuzzleException("Could not find class [$class]");
        } catch (\Exception | \Throwable $e) {
            $errors = implode("\n\n", explode("\n", $e->getTraceAsString()));

            throw new PuzzleException('Could not solve challenge day [' . $puzzle->day() . '] part [' . $puzzle->part() . "] due to: \n**" . $e->getMessage() . "**\n\nTrace: " . $errors);
        }
    }
}
