<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Auth\Redirect;

$admin = new Auth;
$home_url = '../../../index.php'; // redirect link

if (isset($_POST['email'])) { // is empty or not
		$email = $_POST['email'];
		if ($admin->checkEmail($email)) { // checking email
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
