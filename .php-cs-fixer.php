<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$config = new Config();

return $config->setFinder(Finder::create()->in(__DIR__))->setRules(['@PER-CS2.0' => true]);