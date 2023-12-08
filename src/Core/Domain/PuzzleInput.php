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

class PuzzleInput
{
    private function __construct(protected string $data) {}

    public static function fromInput(string $input): self
    {
        return new self($input);
    }

    public function value(): string
    {
        return $this->data;
    }

    public function toArray(string $separator = "\n"): array
    {
        return explode($separator, $this->data);
    }
}
