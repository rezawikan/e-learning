<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Auth\Redirect;


$admin = new Auth;
if (isset($_POST['adminID'])) {
    $adminID = $_POST['adminID'];
    $admin->getDataUser($adminID);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
