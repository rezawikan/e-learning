<?php
session_start();
require_once 'vendor/autoload.php';

use Elearn\Auth\Authentication;
use Elearn\Database\Database;
use Elearn\Auth\Redirect;


// initialize classes
$log        = new Authentication;

if (!$log->is_logged_in()) {
    Redirect::to('index.php');
}

$lecturer  = Database::getInstance();
$id       = $_COOKIE['tutors'];


// get data users
$lecturer->setTable('tutors');
$user = $lecturer->select()->where('id','=',$id)->first();
$user->fullName = $user->first_name . ' ' .$user->last_name;
