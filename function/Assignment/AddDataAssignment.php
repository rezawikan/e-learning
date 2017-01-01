<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Assignment\Assignment;
use Elearn\Files\FileUploader;
use Elearn\Auth\Redirect;


$tutor  = new Assignment;
$upload = new FileUploader;


if (isset($_COOKIE['student'],
    $_POST['student_data_id'],
    $_POST['number'],
    $_FILES
  )) {
    $student_data_id = $_POST['student_data_id'];
    $number          = $_POST['number'];
    $files           = $_FILES;

    $upload->setFileData($_FILES[0]);
    $upload->setDirectory('../../uploads/assignment/');
    $upload->setDestination();
    $upload->MoveFiles();

    $assignment_name = $upload->getFileName();

    if ($number == 1){
        // Replace
        $dataFile = $tutor->fileNameOne($student_data_id);
        $upload->dataFile = $dataFile;
        $upload->DeletePrevFile();
        $result = $tutor->AddDataAssignmentOne($student_data_id, $assignment_name);
    } else {
        // Replace
        $dataFile = $tutor->fileNameTwo($student_data_id);
        $upload->dataFile = $dataFile;
        $upload->DeletePrevFile();
        $result = $tutor->AddDataAssignmentTwo($student_data_id, $assignment_name);
    }

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
