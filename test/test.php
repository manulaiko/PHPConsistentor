<?php
/**
 * Load PHPConsistentor
 */
require_once("../src/PHPConsistentor.php");

//Initialize it
PHPConsistentor::init([
    "word_separator" => PHPConsistentor::WORD_SEPARATION_CAMEL_CASE
]);

PHPConsistentor::addAlias("print_r", "printFuckingSomething");

printFuckingSomething("YOLOOOO");
