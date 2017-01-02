<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\News\News;
use Elearn\Auth\Redirect;


$admin = new News;

if (isset($_COOKIE['tutors'])) {
    $response  = $admin->ViewDataNews();
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
