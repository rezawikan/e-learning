<?php

namespace Elearn\DataStudent;
use PDO;
use DateTime;
use Elearn\Database\Database;

class DataStudent
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function createDataStudent()
  {
    try {
        $user = $this->conn;
        $user->setTable('student_data');
        $result = $user->create([
          'create_at' 			=> date_format(new DateTime(), 'Y-m-d H:i:s')
        ]);

        $id = $user->lastID();
        return $id;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
