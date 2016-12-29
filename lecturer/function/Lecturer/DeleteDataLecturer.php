<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Lecturer\Lecturer;
use Elearn\Auth\Redirect;


$admin = new Lecturer;

if (isset($_COOKIE['admin'],
          $_POST['id']
)) {
    $id           = $_POST['id'];
    $response     = $admin->DeleteDataLecturer($id);

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
