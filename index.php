<?php
require_once('/lib/common_functions.php');
date_default_timezone_set('America/Chicago');
spl_autoload_extensions('.class.php'); 
spl_autoload_register('loadClasses'); 

$pdo = getDatabaseHandler();
$snag = snag::getSnagById($pdo,1);
$snag->toHTML();