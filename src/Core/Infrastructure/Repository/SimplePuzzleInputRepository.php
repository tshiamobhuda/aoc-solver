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

namespace App\Core\Infrastructure\Repository;

use App\Core\Domain\Puzzle;
use App\Core\Domain\PuzzleException;
use App\Core\Domain\PuzzleInput;
use App\Core\Domain\PuzzleInputRepositoryInterface;

class SimplePuzzleInputRepository implements PuzzleInputRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function byPuzzle(Puzzle $puzzle): PuzzleInput
    {
        $path = __DIR__ . "/../../../Resource/Input/day." . $puzzle->day();
        $path .= $puzzle->useTestData() ? ".test.txt" : '.txt';

        if (!file_exists($path)) {
            throw new PuzzleException("Could not find input file at [$path]");
        }

        $data = file_get_contents($path);

        return PuzzleInput::fromInput($data);
    }
}
