<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Quiz\Quiz;
use Elearn\Auth\Redirect;


$lecturer = new Quiz;

if (isset($_COOKIE['tutors'])) {
    $id       = $_COOKIE['tutors'];
    $response = $lecturer->ViewDataQuiz($id);

} else {
    Redirect::to('index.php'); // for direct acces to this file
}
