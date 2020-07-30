<?php

/*
Authentication
Login and logout
*/

class Auth{
public static function isLoggedIn()
{
  return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
}

}