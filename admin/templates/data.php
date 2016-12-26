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

$admin  = Database::getInstance();
$id       = $_COOKIE['admin'];


// get data users
$admin->setTable('admin');
$user = $admin->select()->where('id','=',$id)->first();
$user->fullName = $user->first_name . ' ' .$user->last_name;
