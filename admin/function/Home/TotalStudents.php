<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Student\Student;

$load    = new Student;
$datas    = $load->CountDataStudent();

?>
