<?php

namespace Elearn\Student;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Student
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function ViewDataStudent($tutors_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('students');
        $result = $user->join('enrollments','students.id','=','enrollments.student_id')
        ->join('courses','enrollments.courses_id','=','courses.id')
        ->select('enrollments.student_id, students.first_name, students.last_name, students.email, students.username, courses.subject_id')
        ->where('courses.tutors_id','=', $tutors_id)
        ->orderBy('students.update_at','DESC')->all();

        return $result;

    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function CountDataStudent()
  {
    try {
        $user = $this->conn;
        $user->setTable('students');
        $result = $user->select()->all();

        echo count($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


}
 ?>
