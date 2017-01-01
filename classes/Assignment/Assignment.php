<?php

namespace Elearn\Assignment;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Assignment
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}




  public function ViewDataTutorsID($student_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('assignment','courses.id','=','assignment.id_courses')
        ->join('enrollments','courses.id','=','enrollments.courses_id')
        ->where('enrollments.student_id','=', $student_id)
        ->select('courses.subject_id, enrollments.student_data_id','DISTINCT')
        ->all();

        echo json_encode($result);

    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function ViewDataAssignment($student_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('enrollments','courses.id','=','enrollments.courses_id')
        ->join('student_data','enrollments.student_data_id','=','student_data.id')
        ->join('students','enrollments.student_id','=','students.id')
        ->select('courses.subject_id, student_data.assignment_one, student_data.assignment_two')
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


  public function fileNameOne($id)
  {
    try {
         $user = $this->conn;
         $user->setTable('student_data');
         $result = $user->select()->where('id','=',$id)->first();

         return $result->assignment_one;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function fileNameTwo($id)
  {
    try {
         $user = $this->conn;
         $user->setTable('student_data');
         $result = $user->select()->where('id','=',$id)->first();

         return $result->assignment_two;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function AddDataAssignmentOne($student_data_id, $assignment_name)
  {
    try {
      $user = $this->conn;
      $user->setTable('student_data');
      $result = $user->where('id','=',$student_data_id)->update([
        'assignment_one'			=> $assignment_name
      ]);

      return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function AddDataAssignmentTwo($student_data_id, $assignment_name)
  {
    try {
      $user = $this->conn;
      $user->setTable('student_data');
      $result = $user->where('id','=',$student_data_id)->update([
        'assignment_two'			=> $assignment_name
      ]);

      return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }
}
 ?>
