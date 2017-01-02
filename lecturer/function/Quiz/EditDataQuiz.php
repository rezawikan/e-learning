<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Quiz\Quiz;
use Elearn\Auth\Redirect;


$lecturer = new Quiz;

if (isset($_COOKIE['tutors'],
          $_POST['id']
)) {
    $id           = $_POST['id'];
    $response     = $lecturer->EditDataQuiz($id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
