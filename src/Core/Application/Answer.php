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

class Answer
{
    public function __construct(protected string $answer) {}

    public function value(): string
    {
        return $this->answer;
    }
}
