<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Quiz\Quiz;
use Elearn\Auth\Redirect;


$student = new Quiz;

if (isset($_COOKIE['student'],
          $_POST['courses_id']
    )) {
    $courses_id  = $_POST['courses_id'];
    $response    = $student->ViewDataQuiz($courses_id);

} else {
    Redirect::to('index.php'); // for direct acces to this file
}


// var_dump($_POST);
