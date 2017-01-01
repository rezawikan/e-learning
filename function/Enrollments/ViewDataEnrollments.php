<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Enrollments\Enrollments;
use Elearn\Auth\Redirect;


$student = new Enrollments;

if (isset($_COOKIE['student'])) {
    $student_id = $_COOKIE['student'];
    $response   = (array) $student->ViewDataEnrollments();

    foreach ($response as $key => $value) {
      $courses_id = $value->id;
      $result     = $student->DataCheck($courses_id, $student_id);
      $data[$key]['tutors_name']  = $value->first_name ." ". $value->last_name;
      $data[$key]['subject_id']   = $value->subject_id;
      $data[$key]['description']  = $value->description;
      $data[$key]['subject_name'] = $value->name;
      $data[$key]['id']           = $courses_id;
      if ($result){
          $data[$key]['status'] = 'enrolled';
      } else {
          $data[$key]['status'] = 'Not enrolled';
      }
      // echo "<br />";
      // echo "<br />";
      //       echo $courses_id;
      //
      // echo "--";
      // echo $student_id;
      // echo "<br />";
      // echo "<br />";

      // var_dump($result);
    }

    echo json_encode($data);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
