<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Auth\Redirect;

$student 	= new Auth;
$home_url = '../../index.php'; // redirect link

if (isset($_POST['username'])) { // is empty or not
		$username = $_POST['username'];
		if ($student->checkUser($username)) { // checking username
				$isAvailable = true;
		} else {
				$isAvailable = false;
		}
} else {
			Redirect::to($home_url); // for direct acces to this file
}

// Finally, return a JSON
echo json_encode(array(
	'valid' => $isAvailable, // get result
));
