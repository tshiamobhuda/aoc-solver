<?php

namespace App\Core\Infrastructure\Repository;

use App\Core\Domain\Puzzle;
use App\Core\Domain\PuzzleException;
use App\Core\Domain\PuzzleInput;
use App\Core\Domain\PuzzleInputRepositoryInterface;

class SimplePuzzleInputRepository implements PuzzleInputRepositoryInterface
{
    public function byPuzzle(Puzzle $puzzle): PuzzleInput
    {
        $path = __DIR__ . "/../../../Resource/Input/day." . $puzzle->day();
        $path .= $puzzle->useTestData() ? ".test.txt" : '.txt';

        if (!file_exists($path)) {
            throw new PuzzleException("Could not find input file at [$path]");
        }

        $file = fopen($path, 'r');
        $data = fread($file, filesize($path));
        fclose($file);

        return PuzzleInput::fromInput($data);
    }
}
