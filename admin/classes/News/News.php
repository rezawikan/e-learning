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


  public function createDataNews($title, $description)
  {
    try {
        $user = $this->conn;
        $user->setTable('news');
        $result = $user->create([
          'title' 					=> $title,
          'description'			=> $description,
          'create_at' 			=> date_format(new DateTime(), 'Y-m-d H:i:s')
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
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

  public function EditDataNews($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('news');
        $result = $user->select()->where('id','=',$id)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function UpdateDataNews($title, $description, $id)
  {
    try {
        $user = $this->conn;
        $user->setTable('news');
        $result = $user->where('id','=',$id)->update([
          'title' 					=> $title,
          'description'			=> $description
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function DeleteDataNews($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('tutors');
        $result = $user->where('id','=',$id)->delete();

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function CountDataNews()
  {
    try {
        $user = $this->conn;
        $user->setTable('news');
        $result = $user->select()->all();

        echo count($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

}
 ?>
