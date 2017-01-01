<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Assignment\Assignment;
use Elearn\Auth\Redirect;


$tutor = new Assignment;

if (isset($_COOKIE['student'])) {
    $student_id = $_COOKIE['student'];
    $tutor->ViewDataTutorsID($student_id);

} else {
    Redirect::to('index.php'); // for direct acces to this file
}
