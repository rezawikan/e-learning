<?php

namespace Elearn\Enrollments;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Enrollments
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function createDataEnrollments($courses_id, $student_id, $student_data_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('enrollments');
        $result = $user->create([
          'courses_id' 			=> $courses_id,
          'student_id'		  => $student_id,
          'student_data_id' => $student_data_id,
          'create_at' 			=> date_format(new DateTime(), 'Y-m-d H:i:s')
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }



  public function ViewDataEnrollments()
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('tutors','courses.tutors_id','=','tutors.id')
        ->select('tutors.first_name, tutors.last_name, courses.subject_id, courses.description, courses.name, courses.id')
        ->all();
        return  $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function DataCheck($courses_id, $student_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('enrollments');
        $result = $user->select()->where('courses_id','=', $courses_id)->where('student_id','=', $student_id)->first();


        return $result;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }



  public function CountDataEnrollments()
  {
    try {
        $user = $this->conn;
        $user->setTable('enrollments');
        $result = $user->select()->all();

        echo count($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
