<?php

use src\{Factory, Helper};
use src\Database\{SqlEasy};
use src\Algorithms\{ListNode, SolutionEasy, SolutionMedium, SolutionHard};

require __DIR__ . "/config/main.php";

$easy = new SolutionEasy();
$medium = new SolutionMedium();
$hard = new SolutionHard();

$print = Factory::getDb()
    ->query(SqlEasy::combineTwoTables())
    ->fetch();

Helper::print($print);





