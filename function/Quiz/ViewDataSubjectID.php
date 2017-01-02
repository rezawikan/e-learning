<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Quiz\Quiz;
use Elearn\Auth\Redirect;


$student = new Quiz;

if (isset($_COOKIE['student'])) {
    $student_id = $_COOKIE['student'];
    $student->ViewDataTutorsID($student_id);

} else {
    Redirect::to('index.php'); // for direct acces to this file
}
