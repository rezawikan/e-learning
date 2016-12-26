<?php
session_start();
require_once 'vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Database\Database;
use Elearn\Auth\Token;

$student   = new Auth;
$status    = array();
$home_url  = '../../index.php'; // redirect link
      //
      //
    	// $a = $student->login('rezawikan', 'rezawikan01'); // checking to login
      // var_dump($a);

      $conn = Database::getInstance();
      $conn->setTable('students');
      $result = $conn->select()->where('username','=','rezawikan')->first();

      $a = password_verify('rezawikan01' ,$result->password);

      // echo $result->password;
      echo "</br>";
      echo password_hash('wikandito', PASSWORD_DEFAULT);
      echo "</br>";
      var_dump($a);
