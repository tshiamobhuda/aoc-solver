#!/usr/bin/env php
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

use App\UI\PuzzleSolverCommand;
use Symfony\Component\Console\Application;

require_once __DIR__ . "/vendor/autoload.php";

$app = new Application();
$cmd = new PuzzleSolverCommand();
$app->add($cmd);
$app->setDefaultCommand($cmd->getName(), true);
$app->setAutoExit(true);
$app->run();
