<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Course\Course;
use Elearn\Auth\Redirect;


$admin = new Course;

if (isset($_COOKIE['admin'])) {
    $response  = $admin->ViewDataCourse();
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
