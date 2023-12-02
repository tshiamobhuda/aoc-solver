<?php

namespace App\Core\Domain;

interface PuzzleInputRepositoryInterface
{
    /**
     * @throws PuzzleException
     */
    public function byPuzzle(Puzzle $puzzle): PuzzleInput;
}
