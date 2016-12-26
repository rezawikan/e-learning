<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Auth\Redirect;
use Elearn\Database\Database;

$student 	= new Auth;
$user 		= Database::getInstance();
$home_url = '../../../index.php'; // redirect link



if (isset($_POST['email'],
					$_POST['username'],
					$_POST['firstName'],
					$_POST['lastName'],
					$_POST['gender'],
					$_POST['date'],
					$_POST['password']
					)
		) { // all fill

    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $firstName  = $_POST['firstName'];
		$lastName   = $_POST['lastName'];
		$gender			= $_POST['gender'];
		$date				= $_POST['date'];
		$password   = $_POST['password'];;


		if ($student->register($email, $username, $firstName, $lastName, $gender, $date, $password)) {
				  echo json_encode(array('success' => 'Success to registration', 'process' => 'success'));
	  } else {
	      echo json_encode(array('error' => 'Failed to registration', 'process' => 'failed'));
	  }
} else {
  	Redirect::to($home_url); // for direct acces to this file
}
