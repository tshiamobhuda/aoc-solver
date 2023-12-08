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

class Puzzle
{
    public function __construct(protected int $day, protected string $part, protected bool $useTestData) {}

    public function day(): int
    {
        return $this->day;
    }

    public function part(): string
    {
        return $this->part;
    }

    public function useTestData(): bool
    {
        return $this->useTestData;
    }
}
