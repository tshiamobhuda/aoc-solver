#!/usr/bin/env php
<?php

use Nette\PhpGenerator\PhpFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Symfony\Component\Console\Style\SymfonyStyle;

require_once __DIR__ . "/../vendor/autoload.php";


(new SingleCommandApplication())
    ->setName("Generate AOC solution file")
    ->addArgument("day", InputArgument::REQUIRED, "AOC day")
    ->setCode(
        function (InputInterface $input, OutputInterface $output) {
            $io = new SymfonyStyle($input, $output);

            $tempFilePath = __DIR__ . "/../misc/day.solution.php";

            try {
                $day = $input->getArgument('day');

                $file = PhpFile::fromCode(file_get_contents($tempFilePath));
                $outputFilePath = __DIR__ . "/../src/Resource";


                $isSolutionFileCreated = file_put_contents(
                    "$outputFilePath/Solution/Day$day.php",
                    str_replace("DayNum", "Day$day", $file->__toString())
                );

                $isInputFileCreated = file_put_contents("$outputFilePath/Input/day.$day.test.txt", '');

                if (!$isSolutionFileCreated && !$isInputFileCreated) {
                    $io->error("Failed to create AOC solution file: [Day$day.php]");

                    return Command::FAILURE;
                }

                $io->info("File exists: (" . var_export(file_exists($outputFilePath), true) . ")");
                $io->success("File created: [Day$day.php]\nlocation: [" . realpath($outputFilePath) . "]");

                return Command::SUCCESS;
            } catch (\Exception $exception) {
                $io->error(['File: ' . $exception->getFile(), 'Line: ' . $exception->getLine(), 'Message: ' . $exception->getMessage(),]);

                return Command::FAILURE;
            }
        }
    )
    ->run();
