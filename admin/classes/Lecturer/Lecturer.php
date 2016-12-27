<?php

namespace Elearn\Lecturer;
use PDO;
use DateTime;
use Elearn\Database\Database;

class Lecturer
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function createDataLecturer($email, $username, $firstName, $lastName, $gender, $date, $password)
  {
    try {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $user = $this->conn;
        $user->setTable('tutors');
        $result = $user->create([
          'email' 					=> $email,
          'username'				=> $username,
          'first_name'			=> $firstName,
          'last_name'				=> $lastName,
          'gender'					=> $gender,
          'date_of_birth'		=> $date,
          'password'				=> $pass,
          'create_at' 			=> date_format(new DateTime(), 'Y-m-d H:i:s')
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function ViewDataLecturer()
  {
    try {
        $user = $this->conn;
        $user->setTable('tutors');
        $result = $user->select()->all();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }

  public function EditDataLecturer($id)
  {
    try {
        $user = $this->conn;
        $user->setTable('tutors');
        $result = $user->select()->where('id','=',$id)->first();

        echo json_encode($result);
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function UpdateDataLecturer($email, $firstName, $lastName, $gender, $date, $id)
  {
    try {
        $user = $this->conn;
        $user->setTable('tutors');
        $result = $user->where('id','=',$id)->update([
          'email' 					=> $email,
          'first_name'			=> $firstName,
          'last_name'				=> $lastName,
          'gender'					=> $gender,
          'date_of_birth'		=> $date
        ]);

        return true;
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }


  public function DeleteDataLecturer($id)
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

}
 ?>
