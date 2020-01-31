<?php

namespace Blog\controller;

use Blog\model\RegisterManager;

class RegisterController
{
    public $msg = "";
    public $p = "";
    public $username = "";

    public function showRegisterPage()
    {
        $this->msg = "Register";
        require 'view/registerView.php';
    }
    public function addNewUser($username, $password)
    {
        $registerManager = new RegisterManager();
        $userInserted = $registerManager->pushUserInfo($username, $password);
        $this->msg = "Successful Registration";

        if ($userInserted === false) {
            echo "Something went wrong. Please try again later.";
        } else {
            require 'view/loginView.php';
        }
    }
    public function showLoginPage()
    {
        $this->msg = "...Login";
        require 'view/loginView.php';
    }
    public function login($username, $password)
    {
        var_dump('test');
        $registerManager = new RegisterManager();
        $userSelected = $registerManager->getUserForLogin($username, $password);
        $this->msg = "...Login";
        require 'view/loginView.php';
    }
    public function welcome($username)
    {
        $registerManager = new RegisterManager();
        $userLogedIn = $registerManager->getUser($username);
        $this->msg = "Welcome";
        $this->p = $username;
        $this->username = $username;
        require 'view/welcomeView.php';
    }
    public function logOut()
    {
        // $this->msg = "See Ya";
        // Initialize the session
        session_start();
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session.
        session_destroy();
        // Redirect to login page
        require 'view/logedOutView.php';
        exit;
    }
}
