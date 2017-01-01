<?php

namespace Elearn\Course;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Course
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}



  public function ViewDataCourse($student_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('assignment','courses.id','=','assignment.id_courses')
        ->join('enrollments','courses.id','=','enrollments.courses_id')
        ->select('courses.subject_id, courses.name, courses.day, courses.time, courses.description, assignment.assignment_name, assignment.assignment_number')
        ->where('enrollments.student_id','=', $student_id)
        ->orderBy('assignment.update_at','DESC')->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function CountDataCourse()
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->select()->all();

        echo count($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
