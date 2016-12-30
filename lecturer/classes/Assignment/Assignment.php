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


}
 ?>
