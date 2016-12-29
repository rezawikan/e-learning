<?php

namespace Elearn\Auth;

use DateTime;
use Elearn\Email\Email;
use Elearn\Auth\Session;
use Elearn\Auth\Redirect;
use Elearn\Database\Database;

class Authentication
{

	// private property
	private $conn;
	private $statusActive 	= "A";
	private $statusInactive = "N";
	private $statusSuspend 	= "S";

	public function __construct()
	{
		$this->conn = Database::getInstance();
	}

	// Check Available Username
	public function checkUser($username)
	{
		try {
			$user = $this->conn;
			$user->setTable('tutors');
			$result = $user->select()->where('username','=',$username)->first();

			if($result == null){
				return true;
			}else {
				return false;
			}
		}catch(PDOException $e){
			echo "Error : ". $e->getMessage();
		}
	}

	// Check Available Email
	public function checkEmail($email)
	{
		try {
				$user = $this->conn;
				$user->setTable('tutors');
				$result = $user->select()->where('email','=',$email)->first();

				if ($result == null) {
						return true;
				} else {
						return false;
			}
		}catch(PDOException $e){
			echo "Error : ". $e->getMessage();
		}
	}

	// Register

	public function register($email, $username, $firstName, $lastName, $gender, $date, $password)
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

				if ($result == null) {
						return true;
				} else {
						return false;
			}
		}catch(PDOException $e){
			echo "Error : ". $e->getMessage();
		}
	}


	// user login
	public function login($username, $password)
	{
		try {
				$user = $this->conn;
				$user->setTable('tutors');
				$result = $user->select()->where('username','=',$username)->orWhere('email','=',$username)->first();

			if ($result) {
					if (password_verify($password ,$result->password)) {
							Session::set('tutors',$result->id);
							setcookie('tutors', $result->id, time() + (86400 * 30), "/");
							$status['success'] = 'login successfully';
					} else {
						$status['wrong'] = 'your password is wrong'.$password;
					}
			} else {
					$status['notfound'] = 'Not found, do you have account?';
			}

			echo json_encode($status);
		} catch (PDOException $e) {
				echo "Error ". $e->getMessage;
		}
	}

	// check session and cookie user
	public function is_logged_in(){
		if (Session::exists('tutors') && isset($_COOKIE['tutors']))
		{
				return true;
		} else {
				return false;
		}
	}

	// logout and destroy session
	public function logout()
	{
		Session::destroy();
		Session::empty('tutors');
		setcookie("tutors", "", time() - (86400 * 30), "/");
	}

	//
	// public function generateRandomString($length)
	// {
	//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//     $charactersLength = strlen($characters);
	//     $randomString = '';
	//     $a ='';
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     return $randomString;
	// }

}
