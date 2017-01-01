<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Score\Score;
use Elearn\Auth\Redirect;


$lecturer = new Score;

if (isset($_COOKIE['tutors'])) {
    $id       = $_COOKIE['tutors'];
    $response = $lecturer->ViewDataScore($id);

} else {
    Redirect::to('index.php'); // for direct acces to this file
}
