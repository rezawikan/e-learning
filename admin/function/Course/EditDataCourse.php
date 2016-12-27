<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Course\Course;
use Elearn\Auth\Redirect;


$admin = new Course;

if (isset($_COOKIE['admin'],
          $_POST['id']
)) {
    $id           = $_POST['id'];
    $response     = $admin->EditDataCourse($id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
