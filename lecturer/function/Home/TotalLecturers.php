<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Lecturer\Lecturer;

$load    = new Lecturer;
$datas    = $load->CountDataLecturer();
?>
