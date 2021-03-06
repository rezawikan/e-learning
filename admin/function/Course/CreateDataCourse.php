<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Course\Course;
use Elearn\Auth\Redirect;


$admin = new Course;

if (isset($_COOKIE['admin'],
          $_POST['name'],
          $_POST['subjectID'],
          $_POST['description'],
          $_POST['tutorID'],
          $_POST['day'],
          $_POST['time']
)) {
    $name         = $_POST['name'];
    $subjectID    = $_POST['subjectID'];
    $description  = $_POST['description'];
    $tutorID      = $_POST['tutorID'];
    $day          = $_POST['day'];
    $time         = $_POST['time'];
    $response     = $admin->createDataCourse($name, $subjectID, $description, $tutorID, $day, $time);

    if ($response == true){
        $result['success'] = 'success';
    } else {
        $result['failed'] = 'failed';
    }

    echo json_encode($result);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
