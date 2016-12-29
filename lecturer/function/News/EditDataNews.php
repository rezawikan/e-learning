<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\News\News;
use Elearn\Auth\Redirect;


$admin = new News;

if (isset($_COOKIE['admin'],
          $_POST['id']
)) {
    $id           = $_POST['id'];
    $response     = $admin->EditDataNews($id);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
