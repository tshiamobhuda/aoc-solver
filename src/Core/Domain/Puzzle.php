<?php

namespace App\Core\Domain;

class Puzzle
{
    public function __construct(protected string $day, protected string $part, protected bool $useTestData) {}

    public function day(): string
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
