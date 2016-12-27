<?php

namespace Elearn\Profile;
use PDO;
use Elearn\Database\Database;

class Profile
{

  private $conn;

  public function __construct()
  {
    $this->conn = Database::getInstance();
	}


  public function getDataProfile()
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

  public function getDataUser($id)
	{
		try {
				$user = $this->conn;
				$user->setTable('admin');
				$result = $user->select()->where('id','=',$id)->first();

				echo json_encode($result);
		} catch (PDOException $e) {
				echo "Error ". $e->getMessage;
		}
	}

  public function updateUser($email, $firstName, $lastName, $gender, $date, $id)
	{
		try {
				$user = $this->conn;
				$user->setTable('admin');
				$result = $user->where('id','=',$id)
				->update([
					'email' 				=> $email,
					'first_name'		=> $firstName,
					'last_name'			=> $lastName,
					'gender'				=> $gender,
					'date_of_birth'	=> $date
				]);

				return true;
		} catch (PDOException $e) {
				echo "Error ". $e->getMessage;
		}
	}

	// set a new password
	public function updatePassword($fpassword, $id)
	{
		try {
				$password = password_hash($fpassword, PASSWORD_DEFAULT);
				$user = $this->conn;
				$user->setTable('admin');
				$result = $user->where('id','=',$id)->update([
					'password' => $password
				]);

				return true;
		} catch (PDOException $e) {
			echo "Error". $e->getMessage();
		}
	}

}
 ?>
