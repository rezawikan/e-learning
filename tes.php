<?php
session_start();
require_once 'vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Database\Database;
use Elearn\Enrollments\Enrollments;
use Elearn\Auth\Token;

$student   = new Enrollments;

$a = $student->DataCheck(1,11);
var_dump($a);
?>
