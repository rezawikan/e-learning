<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\News\News;
use Elearn\Auth\Redirect;


$admin = new News;

if (isset($_COOKIE['admin'],
          $_POST['title'],
          $_POST['description']
)) {
    $title      = $_POST['title'];
    $description   = $_POST['description'];
    $response   = $admin->createDataNews($title, $description);

    if ($response == true){
        $result['success'] = 'success';
    } else {
        $result['failed'] = 'failed';
    }

    echo json_encode($result);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

// var_dump($_POST);
