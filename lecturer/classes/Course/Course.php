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




  public function ViewDataCourse($tutors_id)
  {
    try {
        $user = $this->conn;
        $user->setTable('courses');
        $result = $user->select()->where('tutors_id','=',$tutors_id)->all();

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
