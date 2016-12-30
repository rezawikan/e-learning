<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Course\Course;
use Elearn\Auth\Redirect;


$admin = new Course;

if (isset($_COOKIE['tutors'])) {
    $id       = $_COOKIE['tutors'];
    $response = $admin->ViewDataCourse($id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
