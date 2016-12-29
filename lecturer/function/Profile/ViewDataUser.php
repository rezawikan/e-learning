<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\Profile\Profile;
use Elearn\Auth\Redirect;


$admin = new Profile;
if (isset($_POST['adminID'])) {
    $adminID = $_POST['adminID'];
    $admin->getDataUser($adminID);
} else {
    Redirect::to('index.php'); // for direct acces to this file
}
