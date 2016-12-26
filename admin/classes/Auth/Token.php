<?php

namespace Elearn\Auth;

use Elearn\Auth\Session;

class Token
{
  public static function generateToken()
  {
      return Session::set('token', md5(uniqid(rand(),true)));
  }
  public static function checkToken($token)
  {
    return ($token === Session::get('token')) ? true : false;
  }
}
 ?>
