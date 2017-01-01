<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Enrollments\Enrollments;
use Elearn\DataStudent\DataStudent;
use Elearn\Auth\Redirect;


$student = new Enrollments;
$dataStudent = new DataStudent;

if (isset($_COOKIE['student'],
          $_POST['courses_id']
)) {
    $courses_id      = $_POST['courses_id'];
    $student_id      = $_COOKIE['student'];
    $student_data_id = $dataStudent->createDataStudent();
    $response        = $student->createDataEnrollments($courses_id, $student_id, $student_data_id);

    if ($response == true){
        $result['success'] = 'success';
    } else {
        $result['failed'] = 'failed';
    }

    echo json_encode($result);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
