<?php

namespace App\Core\Domain;

class Solver
{
    public const PRE_FQCN = 'App\Resource\Solution\Day';

    /**
     * @throws PuzzleException
     */
    public function solve(PuzzleInput $input, Puzzle $puzzle): string
    {
        //build class FQCN
        $class = self::PRE_FQCN . $puzzle->day();

        try {
            //
            $class = new \ReflectionClass(self::PRE_FQCN . $puzzle->day());

            //instantiate Solution
            /**
             * @var SolutionInterface $instance
             */
            $instance = $class->newInstanceWithoutConstructor();

            //finally solve puzzle
            return match ($puzzle->part()) {
                'a' => $instance->partA($input),
                'b' => $instance->partB($input)
            };
        } catch (\ReflectionException) {
            throw new PuzzleException("Could not find class [$class]");
        } catch (\Exception | \Throwable $e) {
            $errors = implode("\n\n", explode("\n", $e->getTraceAsString()));

            throw new PuzzleException('Could not solve challenge day [' . $puzzle->day() . '] part [' . $puzzle->part() . "] due to: \n**" . $e->getMessage() . "**\n\nTrace: " . $errors);
        }
    }
}
