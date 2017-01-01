<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Assignment\Assignment;
use Elearn\Files\FileUploader;
use Elearn\Auth\Redirect;


$tutor  = new Assignment;
$upload = new FileUploader;


if (isset($_COOKIE['tutors'],
    $_POST['id']
  )) {
    $id        = $_POST['id'];

    $upload->setDirectory('../../uploads/assignment/');
    $dataFile = $tutor->fileName($id);
    $upload->dataFile = $dataFile;
    $upload->DeletePrevFile();

    $result = $tutor->DeleteDataAssignment($id);
    $upload->flush();

    if ($result){
        $results['success'] = "success";
    }

    echo json_encode($results);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}

//
// var_dump($_POST);
// var_dump($_FILES);
