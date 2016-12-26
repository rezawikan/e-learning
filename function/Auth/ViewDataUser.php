<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Auth\Redirect;


$student = new Auth;
if (isset($_POST['studentID'])) {
    $studentID = $_POST['studentID'];
    $student->getDataUser($studentID);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
