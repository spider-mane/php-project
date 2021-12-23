<?php

use WebTheory\Exterminate\Exterminator;

$root = dirname(__DIR__);

require_once "$root/vendor/autoload.php";

Exterminator::debug([
    'enable' => true,
    'display' => true,
    'log' => "$root/logs/pseudo-package.log",
    'error_logger' => true,
    'error_handler' => true,
    'var_dumper' => ['root' => $root],
]);
