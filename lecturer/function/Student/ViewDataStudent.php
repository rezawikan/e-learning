<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Student\Student;
use Elearn\Auth\Redirect;


$lecturer = new Student;

if (isset($_COOKIE['tutors'])) {
    $tutors_id = $_COOKIE['tutors'];
    $response  = $lecturer->ViewDataStudent($tutors_id);

    if ($response == null){
        $result['empty'] = 'Data student is empty';
        echo json_encode($result);
    }

} else {
    Redirect::to('index.php'); // for direct acces to this file
}
