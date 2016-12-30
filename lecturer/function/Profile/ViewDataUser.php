<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Profile\Profile;
use Elearn\Auth\Redirect;


$lecturer = new Profile;
if (isset($_POST['tutors'])) {
    $lecturerID = $_POST['tutors'];
    $lecturer->getDataUser($lecturerID);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
