<?php

namespace App\Core\Application;

class Answer
{
    public function __construct(protected string $answer) {}

    public function value(): string
    {
        return $this->answer;
    }
}
