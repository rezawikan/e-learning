<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Course\Course;
use Elearn\Auth\Redirect;


$admin = new Course;

if (isset($_COOKIE['student'])) {
    $student_id = $_COOKIE['student'];
    $response   = $admin->ViewDataCourse($student_id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
