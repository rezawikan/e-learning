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


  public function createDataCourse($name, $subjectID, $description, $tutorID, $day, $time)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->create([
          'name'        => $name,
          'subject_id'  => $subjectID,
          'description' => $description,
          'tutors_id'   => $tutorID,
          'day'         => $day,
          'time'        => $time,
          'create_at'   => date_format(new DateTime(), 'Y-m-d H:i:s')
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function ViewDataCourse()
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->select()->orderBy('create_at','DESC')->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function EditDataCourse($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->select()->where('id','=',$id)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function UpdateDataCourse($name, $subjectID, $description, $tutorID, $day, $time, $id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->where('id','=',$id)->update([
          'name'        => $name,
          'subject_id'  => $subjectID,
          'description' => $description,
          'tutors_id'   => $tutorID,
          'day'         => $day,
          'time'        => $time
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function DeleteDataCourse($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->where('id','=',$id)->delete();

        return true;
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
