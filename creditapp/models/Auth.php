<?php
class Auth
{
    public function __construct()
    {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    public function checkLogin($username, $password)
    {
        if($username == "joao" && $password == "1234")
        {
            $_SESSION['nome'] = $username;
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['nome']);
    }

    public function logout()
    {
        session_destroy();
    }

    public function getUsername()
    {
        if(isset($_SESSION['nome']))
        {
            return $_SESSION['nome'];
        }
        return null;
    }

}
