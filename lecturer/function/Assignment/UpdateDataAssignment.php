<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Assignment\Assignment;
use Elearn\Files\FileUploader;
use Elearn\Auth\Redirect;


$tutor  = new Assignment;
$upload = new FileUploader;


if (isset($_COOKIE['tutors'],
    $_POST['id'],
    $_FILES
  )) {
    $id        = $_POST['id'];
    $files     = $_FILES;

    $upload->setFileData($_FILES[0]);
    $upload->setDirectory('../../uploads/assignment/');
    $upload->setDestination();
    $upload->dataFile = $tutor->fileName($id);
    $upload->DeletePrevFile();
    $upload->MoveFiles();

    // Set Destination
    $upload->setDirectory('uploads/assignment/');
    $upload->setDestination();

    $assignment_name = $upload->getFileName();
    $assignment_path = $upload->getDestination();
    $result = $tutor->UpdateDataAssignment($id, $assignment_name, $assignment_path);


    // var_dump($_FILES[0]);

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
