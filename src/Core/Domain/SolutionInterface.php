<?php

namespace App\Core\Domain;

interface SolutionInterface
{
    public function partA(PuzzleInput $input): string;
    public function partB(PuzzleInput $input): string;
}
