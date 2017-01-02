<?php

namespace Elearn\News;
use PDO;
use DateTime;
use Elearn\Database\Database;

class News
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function ViewDataNews()
  {
    try {
        $user = $this->conn;
        $user->setTable('news');
        $result = $user->select()->orderBy('update_at','DESC')->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
