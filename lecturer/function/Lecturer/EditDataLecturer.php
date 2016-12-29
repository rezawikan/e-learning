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
    $response     = $admin->EditDataLecturer($id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
