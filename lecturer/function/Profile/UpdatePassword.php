<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Profile\Profile;
use Elearn\Auth\Redirect;

$admin   = new Profile;
$home_url = '../../../index.php'; // redirect link
$result = array();

if (isset($_POST['password'])){
  $password 	  = $_POST['password'];
  $id 		    = $_COOKIE['tutors'];

  if ($admin->updatePassword($password, $id))	{
      $result['valid'] = 'success';
      echo json_encode($result);
  }
} else {
		Redirect::to($home_url); // for direct acces to this file
}
