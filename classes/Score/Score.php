<?php

namespace Elearn\Score;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Score
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function ViewDataScore($student_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('enrollments','courses.id','=','enrollments.courses_id')
        ->join('student_data','enrollments.student_data_id','=','student_data.id')
        ->join('students','enrollments.student_id','=','students.id')
        ->select('courses.name, courses.subject_id, students.id, students.first_name, students.last_name, student_data.quiz, student_data.assignment_one, student_data.assignment_two')
        ->where('enrollments.student_id','=', $student_id)
        ->all();

        if ($result == null){
            $results['empty'] = 'Data is empty';
            echo json_encode($results);
        } else {
            echo json_encode($result);
        }

    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
