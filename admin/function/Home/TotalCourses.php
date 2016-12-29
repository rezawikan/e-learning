<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Course\Course;

$load    = new Course;
$datas    = $load->CountDataCourse();
?>
