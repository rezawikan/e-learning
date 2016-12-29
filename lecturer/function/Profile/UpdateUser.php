<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Profile\Profile;
use Elearn\Auth\Redirect;

$admin 	= new Profile;
$home_url = '../../../index.php'; // redirect link



if (isset($_POST['email'],
					$_POST['firstName'],
					$_POST['lastName'],
					$_POST['gender'],
					$_POST['date']
					)
		) { // all fill

    $email      = $_POST['email'];
    $firstName  = $_POST['firstName'];
		$lastName   = $_POST['lastName'];
		$gender			= $_POST['gender'];
		$date				= $_POST['date'];
    $id         = $_COOKIE['admin'];


		if ($admin->updateUser($email, $firstName, $lastName, $gender, $date, $id)) {
				  echo json_encode(array('success' => 'Success to registration', 'process' => 'success'));
	  } else {
	      echo json_encode(array('error' => 'Failed to registration', 'process' => 'failed'));
	  }
} else {
  	Redirect::to($home_url); // for direct acces to this file
}
