<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

$codegen = new libgccjit\CodeGen;
$code = $codegen->generate();

file_put_contents(__DIR__ . '/lib/functions.php', $code);

echo "Done";