<?php

use Dotenv\Exception\InvalidPathException;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');

try {
    $dotenv->load();
}
catch (InvalidPathException $e) {
    echo $e->getMessage();
}