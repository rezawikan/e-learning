<?php
session_start();
require_once 'vendor/autoload.php';

use Elearn\Auth\Authentication as Auth;
use Elearn\Auth\Redirect;

$logout = new Auth;

if (!$logout->is_logged_in()) {
    Redirect::to('index.php');
}

if ($logout->is_logged_in()!="") {
		$logout->logout();
		Redirect::to('index.php');
}
