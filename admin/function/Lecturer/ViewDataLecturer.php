<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Lecturer\Lecturer;
use Elearn\Auth\Redirect;


$admin = new Lecturer;

if (isset($_COOKIE['admin'])) {
    $response  = $admin->ViewDataLecturer();
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
