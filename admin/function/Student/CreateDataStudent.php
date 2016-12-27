<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Student\Student;
use Elearn\Auth\Redirect;


$admin = new Student;

if (isset($_COOKIE['admin'],
          $_POST['email'],
          $_POST['username'],
          $_POST['password'],
          $_POST['firstName'],
          $_POST['lastName'],
          $_POST['gender'],
          $_POST['date']
)) {
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $gender     = $_POST['gender'];
    $date       = $_POST['date'];
    $response   = $admin->createDataStudent($email, $username, $firstName, $lastName, $gender, $date, $password);

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
