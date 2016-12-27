<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Lecturer\Lecturer;
use Elearn\Auth\Redirect;


$admin = new Lecturer;

if (isset($_COOKIE['admin'],
          $_POST['email'],
          $_POST['firstName'],
          $_POST['lastName'],
          $_POST['gender'],
          $_POST['date'],
          $_POST['id']
)) {
    $email      = $_POST['email'];
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $gender     = $_POST['gender'];
    $date       = $_POST['date'];
    $id         = $_POST['id'];
    $response     = $admin->UpdateDataLecturer($email, $firstName, $lastName, $gender, $date, $id);

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
