<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Assignment\Assignment;
use Elearn\Auth\Redirect;


$admin = new Assignment;

if (isset($_COOKIE['tutors'],
          $_POST['id']
)) {
    $id           = $_POST['id'];
    $response     = $admin->EditDataAssignment($id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
