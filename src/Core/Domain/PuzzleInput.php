<?php

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
