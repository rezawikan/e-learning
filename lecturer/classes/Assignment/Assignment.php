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


  public function ViewDataTutorsID($tutors_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->select()->where('tutors_id','=', $tutors_id)->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function ViewDataAssignment($tutors_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('assignment','courses.id','=','assignment.id_courses')
        ->select('courses.subject_id, courses.name, assignment.assignment_number, assignment.id, assignment.update_at, assignment.assignment_name')
        ->where('tutors_id','=', $tutors_id)
        ->orderBy('assignment.update_at','DESC')
        ->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function fileName($id)
{
  try {
       $user = $this->conn;
       $user->setTable('assignment');
       $result = $user->select()->where('id','=',$id)->first();

       return $result->assignment_name;
  } catch (PDOException $e) {
    echo "Error : ".$e->getMessage();
  }
}


  public function AddDataAssignment($id_course, $number, $assignment_name, $assignment_path)
  {
    try {
      $user = $this->conn;
      $user->setTable('assignment');
      $result = $user->create([
        'id_courses'				  => $id_course,
        'assignment_number'   => $number,
        'assignment_name'			=> $assignment_name,
        'assignment_path'			=> $assignment_path,
        'create_at' 			    => date_format(new DateTime(), 'Y-m-d H:i:s')
      ]);

      return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function EditDataAssignment($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->join('assignment','courses.id','=','assignment.id_courses')
        ->select('courses.subject_id, assignment.id_courses, assignment.assignment_number, assignment.id')
        ->where('assignment.id','=',$id)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function UpdateDataAssignment($id, $assignment_name, $assignment_path)
  {
    try {
      $user = $this->conn;
      $user->setTable('assignment');
      $result = $user->where('id','=', $id)->update([
        'assignment_name'			=> $assignment_name,
        'assignment_path'			=> $assignment_path,
      ]);

      return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function DeleteDataAssignment($id)
  {
    try {
      $user = $this->conn;
      $user->setTable('assignment');
      $result = $user->where('id','=', $id)->delete();

      return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
