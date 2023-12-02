#!/usr/bin/env php
<?php

use App\UI\PuzzleSolverCommand;
use Symfony\Component\Console\Application;

require_once __DIR__ . "/vendor/autoload.php";

$app = new Application();
$cmd = new PuzzleSolverCommand();
$app->add($cmd);
$app->setDefaultCommand($cmd->getName(), true);
$app->setAutoExit(true);
$app->run();
