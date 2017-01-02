<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Score\Score;
use Elearn\Auth\Redirect;


$student = new Score;

if (isset($_COOKIE['student'])) {
    $id       = $_COOKIE['student'];
    $response = $student->ViewDataScore($id);

} else {
    Redirect::to('index.php'); // for direct acces to this file
}
